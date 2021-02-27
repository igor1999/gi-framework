giClient.custom.job.process.Process = function()
{
    giClient.core.widget.Base.call(this);


    const CHECK_TIMEOUT = 2000;


    let me = this;


    let _progressBar;
    this.getProgressBar = function()
    {
        return _progressBar;
    };

    let _startButton;
    this.getStartButton = function()
    {
        return _startButton;
    };

    let _processId;
    this.getProcessId = function()
    {
        return _processId;
    };


    this.construct = function(objectHash)
    {
        this.setObjectHash(objectHash);

        _progressBar = this.getObjectElement('progress-bar');
        _startButton = this.getObjectElement('start-button');

        _startButton.addEventListener(
            'click',
            function()
            {
                _startButton.disabled = true;
                _progressBar.value = 0;

                let d = new Date();
                _processId   = me.getCsrfToken() + '-' + d.getTime();

                let url  = me.getServerData('start-url');
                let data = {job: _processId};

                me.createAjax().getUrlEncoded().setMethodToPost().send(url, data, processStart);
            }
        );

        return this;
    };

    let processStart = function()
    {
        setTimeout(check, CHECK_TIMEOUT);
    }

    let check = function()
    {
        let url  = me.getServerData('check-url');
        let data = {job: _processId};

        me.createAjax().getUrlEncoded().setMethodToGet().setResponseTypeToJson().send(url, data, processCheck);
    }

    let processCheck = function(response)
    {
        let {done = false, value = 0} = response;

        _progressBar.value = value;

        if (done) {
            alert('Process completed!');
            _startButton.disabled = false;
        } else {
            setTimeout(check, CHECK_TIMEOUT);
        }
    }
};