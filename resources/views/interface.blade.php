<!DOCTYPE html>
<html>
    <head>
        <title>Interface</title>
        <script src="lib/vue.js"></script>
    </head>
    <body>
        <h1>Interface</h1>
        <div id="nyanko">
            <h2>@{{ message }}</h2>
            <div>
                <p>@{{ paragraph }}</p>
            <div>
        </div>
        <script type="text/javascript">
            var vm = new Vue({
                el : '#nyanko',
                data : {
                    message : 'Nyanko',
                    paragraph : 'This is a long story actually'
                }
            });
        </script>
    </body>
</html>
