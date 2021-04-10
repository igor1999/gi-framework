giClient.core.customNamespace('blog.comment.modifying.creation');

giClient.custom.blog.comment.modifying.creation.factory = new function()
{
    giClient.core.widget.Factory.call(this);


    this.setLoading('blog-comment-modifying-creation');


    this.create = function(objectHash)
    {
        return new giClient.custom.blog.comment.modifying.base.Modifying().construct(objectHash);
    };
};