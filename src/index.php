<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'StringBuilder.php';
?>

<!DOCTYPE>
<html>
<head>
<title>php sample</title>
</head>
<body>
<?php
   

    $sb = new StringBuilder();
    echo 'Hello World!';
    print("<br/>");
    $sb->append('88888');
    $sb->append('7777777777');

    print $sb->toString();
    $sb->clear();
    $sb->append('kkkkkkkkk');
    print '<br/>'. $sb->toString();

    include 'metterial/a.php';
?>

<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/q/q.js"></script>
<script>
 $(function(){
    var data = getData();

    data.then(function(results){
        var data = results.responseJSON.results;
        $.each(data, function(index, val){
                console.log(val);
        })
    }, function(err){console.log(err)});

    function getData(){
        var uri = 'https://randomuser.me/api/';
        // Similar to jQuery's "complete" callback: return "xhr" regardless of success or failure
        return Q.promise(function (resolve, reject) {
            $.ajax({
                url: uri,
                type: "GET",
                contentType: 'application/json; charset=utf8;',
                dataType: 'JSON',
            }).then(function (data, textStatus, jqXHR) {
                delete jqXHR.then; // treat xhr as a non-promise
                resolve(jqXHR);
            }, function (jqXHR, textStatus, errorThrown) {
                delete jqXHR.then; // treat xhr as a non-promise
                reject(jqXHR);
            });
        });
    }
 });
</script>


</body>
</html>
