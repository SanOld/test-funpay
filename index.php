<?php
/*TASK FIRST*/
$sms = 'Пароль: 4359
        Спишется 1123,00р.
        Перевод на счет 410014601974385';

$result = parser($sms);

function parser ( $sms ){

  //разделил в разные регулярки для наглядности
  $result1 = preg_match('/\d{4}/', $sms, $password);
  $result2 = preg_match('/([0-9]+\,[0-9]{1,2})/', $sms, $sum);
  $result3 = preg_match('/\d{15}/', $sms, $number);

  return array( 'password'  => $password[0]
              , 'sum'       => $sum[0]
              , 'number'    => $number[0]);
};
?>


<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- Page -->
    <div class="raw">
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Task first</div>
          <div class="panel-body">
            
            <div class="form-group">
              <label for="sms" class="col-sm-2 control-label">СМС:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="sms" disabled placeholder="Пароль" value="<?php echo $sms; ?>">
              </div>
            </div>
            </br>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Пароль:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="password" placeholder="Пароль" value="<?php echo $result['password']; ?>">
              </div>
            </div>
            </br>
            <div class="form-group">
              <label for="sum" class="col-sm-2 control-label">Сумма:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="sum" placeholder="Сумма" value="<?php echo $result['sum']; ?>">
              </div>
            </div>
            </br>
            <div class="form-group">
              <label for="number" class="col-sm-2 control-label">Номер:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="number" placeholder="Номер" value="<?php echo $result['number'];; ?>">
              </div>
            </div>
           
          </div>
        </div>

      </div>
    </div>
    <div class="clearfix"></div>
    <div class="raw">
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Task second</div>
          <div class="panel-body">
            <div class="form-group">
              <button class="btn btn-primary btn-lg task2" >
                Выполнить
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Название модали</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

  </body>

  <script>

    var url = 'http://test-funpay/answer.php';

    function test( url ){
      var jqxhr = $.get( url, function(data) {
        $('.modal-body').wrapInner(data);
      })
        .fail(function() {
          $('.modal-body').wrapInner("<div class='new'>Error</div>");
        })
    }

    $('.task2').on('click',function() {
      test(url);
      $('#myModal').modal('show');
    })
    
  </script>

</html>
