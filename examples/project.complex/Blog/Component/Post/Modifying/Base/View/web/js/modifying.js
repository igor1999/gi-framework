giClient.custom.blog.post.modifying.base.Modifying = function()
{
    giClient.core.widget.Base.call(this);


    let me = this;


    let _form;
    this.getForm = function()
    {
        return _form;
    };

    let _resultMessageContainer;
    this.getResultMessageContainer = function()
    {
        return _resultMessageContainer;
    };

    let _successMessage;
    this.getSuccessMessage = function()
    {
        return _successMessage;
    };


    this.construct = function(objectHash)
    {
        this.setObjectHash(objectHash);

        _form                   = this.getObjectElement('form');
        _resultMessageContainer = this.getObjectElement('result-message-container', _form);
        _successMessage         = this.getServerData('success-message');

        _form.addEventListener(
            'submit',
            function(e)
            {
                e.preventDefault();

                me.createAjax().getUrlEncoded().setMethodToPost().setResponseTypeToJson().send(
                    _form.action, me.extractForm(_form), showResponse
                );
            }
        );

        return this;
    };

    let showResponse = function(data)
    {
        let errorClass = 'gi-error';

        let {success = 1, redirectURI = '', messages = []} = data;

        if (success === 1) {
            _resultMessageContainer.classList.remove(errorClass);
            _resultMessageContainer.innerHTML = _successMessage;
            document.location.href = redirectURI;
        } else {
            _resultMessageContainer.classList.add(errorClass);
            _resultMessageContainer.innerHTML = messages.join('<br/>');
        }
    };
};