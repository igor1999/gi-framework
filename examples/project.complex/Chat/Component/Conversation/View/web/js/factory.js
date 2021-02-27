giClient.custom.chat.conversation.factory = new function()
{
    giClient.core.widget.Factory.call(this);


    this.setLoading('chat-conversation');


    this.create = function(objectHash)
    {
        return new giClient.custom.chat.conversation.Conversation().construct(objectHash);
    };
};