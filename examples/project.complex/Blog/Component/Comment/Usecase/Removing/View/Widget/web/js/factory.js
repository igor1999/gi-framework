giClient.core.customNamespace('blog.comment.modifying.removing');

giClient.custom.blog.comment.modifying.removing.factory = new function()
{
    giClient.core.widget.Factory.call(this);


    this.setLoading('blog-comment-modifying-removing');


    this.create = function(objectHash)
    {
        return new giClient.custom.blog.comment.modifying.removing.Removing().construct(objectHash);
    };
};