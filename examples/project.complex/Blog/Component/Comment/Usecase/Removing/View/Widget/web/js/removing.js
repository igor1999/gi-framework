giClient.core.customNamespace('blog.comment.modifying.removing');

giClient.custom.blog.comment.modifying.removing.Removing = function()
{
    giClient.core.widget.Base.call(this);


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


    this.construct = function(objectHash)
    {
        this.setObjectHash(objectHash);

        _deleteButton = this.getObjectElement('delete-button');

        _confirmationText = this.getServerData('confirmation-text');

        _deleteButton.addEventListener(
            'click',
            function()
            {
                if (confirm(_confirmationText)) {
                    let url = me.getServerData('uri');

                    me.createAjax().getUrlEncoded().setMethodToPost().send(url, {}, redirect);
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