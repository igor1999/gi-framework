$(document).ready(
    function()
    {
        $('#word-form').submit(
            function(e)
            {
                e.preventDefault();

                let value    = $("#word").val();
                let encoding = $("#encoding").val();

                if (value !== '') {
                    $.get(
                        '/crypt',
                        {
                            word: value,
                            encoding: encoding
                        },
                        function(response)
                        {
                            let title = encoding === 'md5' ? '<b>MD5 encoding:</b> ' : '<b>SHA1 encoding:</b> ';

                            $('#response').html(title + response).removeClass('error');
                        }
                    ).fail(
                        function(response)
                        {
                            $('#response').html('<b>error:</b> ' + response.responseText).addClass('error');
                        }
                    );
                }
            }
        );

        $("#word").bind(
            'keyup',
            function()
            {
                $("#send-button").attr('disabled', $("#word").val() === '');
            }
        );
    }
);