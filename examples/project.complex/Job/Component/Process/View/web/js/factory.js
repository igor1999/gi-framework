giClient.custom.job.process.factory = new function()
{
    giClient.core.widget.Factory.call(this);


    this.setLoading('job-process');


    this.create = function(objectHash)
    {
        return new giClient.custom.job.process.Process().construct(objectHash);
    };
};