<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            function nos(){
                var val = document.getElementById('from').value;
                val = val.replace(/ /g,'&nbsp');
                val = val.replace(/</g,'&lt');
                val = val.replace(/>/g,'&gt');
                //val = val.replace(/\n/g,'<br>\n');
                var lis = val.split('\n');
                var last = '<p><div style="overflow: scroll;line-height:1.4;text-align:left;background-color:rgb(25,25,25);padding:20px;">';
                for (var i = 1;i <= lis.length;i++){
                    last += '<div style="display:flex;">';
                    last += '<code style="margin-right:12px;background-color:rgb(55,25,25);padding:12px;padding-left:20px;padding-top:2px;">';
                    last += i.toString();
                    last += '</code>';
                    last += '<code>';
                    last += lis[i-1];
                    last += '</code>';
                    last += '</div>';
                }
                last += '</div></p>';
                document.getElementById('to').value = last;
            }
        </script>
    </head>
    <body>
        <h2>From:</h2>
        <textarea id="from"></textarea>
        <br>
        <button onclick="nos()">Rasterize</button>
        <h2>To:</h2>
        <textarea readonly id="to">kadal</textarea>
    </body>
</html>
