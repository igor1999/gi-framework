giClient.core.customNamespace('chat.conversation');

giClient.custom.chat.conversation.Conversation = function()
{
    giClient.core.widget.Base.call(this);


    let me = this;


    let _board;
    this.getBoard = function()
    {
        return _board;
    };

    let _messageContainer;
    this.getMessageContainer = function()
    {
        return _messageContainer;
    };

    let _messages;
    this.getMessages = function()
    {
        return _messages;
    };

    let _textbox;
    this.getTextbox = function()
    {
        return _textbox;
    };

    let _sendButton;
    this.getSendButton = function()
    {
        return _sendButton;
    };

    let _socket;
    this.getSocket = function()
    {
        return _socket;
    };


    this.construct = function(objectHash)
    {
        this.setObjectHash(objectHash);

        _board             = this.getObjectElement('board');
        _messageContainer  = this.getObjectElement('message-container');
        _messages          = JSON.parse(this.getServerData('messages'));
        _textbox           = this.getObjectElement('textbox');
        _sendButton        = this.getObjectElement('send-button');

        _textbox.addEventListener(
            'keyup',
            function()
            {
                _sendButton.disabled = (_textbox.value === '');
            }
        );

        _sendButton.addEventListener(
            'click',
            function()
            {
                _socket.send(_textbox.value);
            }
        );

        initSocket();

        return this;
    };

    let initSocket = function()
    {
        let host = me.getServerData('host');
        let port = me.getServerData('port');
        let url  = `wss://${host}:${port}`;

        _socket = new WebSocket(url);

        _socket.onopen = function()
        {
            _socket.send(me.getSessionId());
        };

        _socket.onmessage = function(event)
        {
            process(JSON.parse(event.data));
        };

        _socket.onerror = function(error)
        {
            let message = me.render(_messages.error, error);
            addMessage(message, _messageContainer);
        };

        _socket.onclose = function(event)
        {
            let message = me.render(_messages.closed, event);
            addMessage(message, _messageContainer);

            addMessage(_messages.refresh, _messageContainer);

            _socket = null;
            lock();
        };
    }

    let addMessage = function(message, container)
    {
        let p = document.createElement('p');
        p.innerHTML = message;

        container.appendChild(p);
    };

    let lock = function()
    {
        _textbox.disabled    = true;
        _sendButton.disabled = true;
    };

    let process = function(data)
    {
        let {text = ''} = data;

        if (text !== '') {
            addMessage(text, _messageContainer);
        } else if (data.title === 'join') {
            let message = me.render(_messages.join, data);
            addMessage(message, _board);
        } else if (data.title === 'leave') {
            let {leave} = _messages;
            let message = me.render(leave, data);
            addMessage(message, _board);
        } else if (data.title === 'message') {
            let message = me.render(_messages.message, data);
            addMessage(message, _board);
        }
    }
};