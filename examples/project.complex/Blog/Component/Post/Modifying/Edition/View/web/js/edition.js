giClient.custom.blog.post.modifying.edition.Editing = function()
{
    giClient.custom.blog.post.modifying.base.Modifying.call(this);


    let me = this;


    let _confirmationText;
    this.getConfirmationText = function()
    {
        return _confirmationText;
    };


    let _deleteButton;
    this.getDeleteButton = function()
    {
        return _deleteButton;
    };


    let _parentConstruct = this.construct;
    this.construct = function(objectHash)
    {
        _parentConstruct.call(this, objectHash);

        _deleteButton = this.getObjectElement('delete-button');

        _confirmationText = this.getServerData('confirmation-text');

        _deleteButton.addEventListener(
            'click',
            function()
            {
                if (confirm(_confirmationText)) {
                    let url = me.getServerData('uri');
                    me.createAjax().getUrlEncoded().setMethodToPost().setResponseTypeToText().send(url, {}, redirect);
                }
            }
        );

        return this;
    };

    let redirect = function(uri)
    {
        document.location.href = uri;
    };
};