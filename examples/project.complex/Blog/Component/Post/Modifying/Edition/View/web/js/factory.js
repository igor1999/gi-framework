giClient.core.customNamespace('blog.post.modifying.edition');

giClient.custom.blog.post.modifying.edition.factory = new function()
{
    giClient.core.widget.Factory.call(this);


    this.setLoading('blog-post-modifying-edition');


    this.create = function(objectHash)
    {
        return new giClient.custom.blog.post.modifying.edition.Editing().construct(objectHash);
    };
};