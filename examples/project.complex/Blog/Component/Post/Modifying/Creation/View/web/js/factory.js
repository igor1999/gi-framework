giClient.custom.blog.post.modifying.creation.factory = new function()
{
    giClient.core.widget.Factory.call(this);


    this.setLoading('blog-post-modifying-creation');


    this.create = function(objectHash)
    {
        return new giClient.custom.blog.post.modifying.base.Modifying().construct(objectHash);
    };
};