<!DOCTYPE html>
<html>

<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    main {
      padding: 1%;
    }

    .btn-success.focus, .btn-success {
            background-color: #329a93 !important;
        }

        .btn-success.focus, .btn-success:focus {
            box-shadow: 0 0 0 0.2rem #329a935c !important;
        }
  </style>
  <title>Просмотр расписания</title>
</head>

<body>
  <div class="container-fluid bg-light">
    <div class="row align-items-center justify-content-center">
    <a href="/" class="pull-left"><img src="../../../../../wp-content/themes/bostan/images/logo.png"></a> 
      <div class="col-md-2 pt-3">
        <div class="form-group ">
          <select id="spec" class="form-control">
            <option selected hidden>Специальность</option>
            <option>ПОИТ</option>
            <option>ОДвЛ</option>
            <option>Правоведение</option>
            <option>БУАиК</option>
          </select>
        </div>
      </div>
      <div class="col-md-2 pt-3">
        <div class="form-group">
          <select id="group" class="form-control">
            <option selected hidden>Группа</option>
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <button type="button" id="getSchedule" class="btn btn-success btn-block">Найти</button>
      </div>
    </div>
  </div>
  <main></main>
  <script type="text/javascript">
    function groupBy(list, keyGetter) {
      const map = new Map();
      list.forEach((item) => {
        const key = keyGetter(item);
        const collection = map.get(key);
        if (!collection) {
          map.set(key, [item]);
        } else {
          collection.push(item);
        }
      });
      return map;
    }

    let nowSpec = "";
    let nowGroup = "";

    $("#spec").change(function () {
      nowSpec = $(this).children("option:selected").val();
      let myNode = document.getElementById("group");
      while (myNode.firstChild) {
          myNode.removeChild(myNode.firstChild);
      }
      let opt = document.createElement("option");
      opt.setAttribute("hidden", "");
      opt.setAttribute("selected", "");
      opt.appendChild(document.createTextNode('Группа'));
      myNode.appendChild(opt);
      $.get("/wp-content/plugins/shedule/api/getGroup.php", {
        spec: nowSpec
      }).done((data) => {
        $("#group").find('option:not(:first)').remove();
        for (let prop in data) {
          $("#group").append(new Option(data[prop].group_name, data[prop].id_group));
        };
      });
    });

    $("#group").change(function () {
      nowGroup = $(this).children("option:selected").val();
    });

    $("#getSchedule").click(() => {
      let content = "";
      $('.text-center').remove();
      $('.table').remove();
      $.get("/wp-content/plugins/shedule/api/getSchedule.php", {
        group: nowGroup
      }, (data) => {
        if (data !== 'undefined' && data !== '' && data.toString() !== '404') {
          let group = groupBy(data, item => item.date);
          group = new Map([...group.entries()].sort((a, b) => {
            return a[0] > b[0]? 1 : -1; 
          }));
          content = "";
          group.forEach(item => {
            content = `<h2 class="text-center">${(new Date(item[0].date)).toLocaleDateString()} (${new Date(item[0].date).toLocaleString('ru-ru', {  weekday: 'long' })}) </h2><table class="table table-bordered table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Начало</th>
                      <th scope="col">Конец</th>
                      <th scope="col">Предмет</th>
                      <th scope="col">Преподаватель</th>
                      <th scope="col">Аудитория</th>
                    </tr>
                  </thead>
                  <tbody>`;
            item.forEach(subItem => {
              content +=
                `<tr><td>${subItem.from.replace(/:\d+$/gm, '')}</td><td>${subItem.to.replace(/:\d+$/gm, '')}</td><td>${subItem.subject}</td><td>${subItem.Teacher}</td><td>${subItem.Cabinet}</td></tr>`;
            });
            $('main').append(content);
            content = "";
          });
        } else {
          $('main').html("");
          content = '<p class="text-center" style="font-size: 2em">Расписания не найдено</p>';
          $('main').append(content);
        }
      });
    });
  </script>
</body>

</html>