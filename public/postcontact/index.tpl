<component name="common.page.document">

<main id="main">

<component name="components.breadcrumbs" $text1="Проверка данных"/>

     <h2 style="margin-bottom: 25px; margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     {{for $rows as $row}}
     <div class="row">
          <hr width="700" size="5">
          <div data-id2="{{$row.email}}" class="col-3 email-edit" style="margin-left: 35px">{{$row.email}}</div>
          <div data-id3="{{$row.name}}" class="col name-edit">{{$row.name}}</div>
          <div data-id4="{{$row.subject}}" class="col subject-edit">{{$row.subject}}</div>
         <button data-email="{{$row.email}}" data-name="{{$row.name}}" data-subject="{{$row.subject}}" data-id="{{$row.id}}" type="button" class="btn btn-edit btn-primary btn-sm" style="width: 100px; height: 30px; margin-bottom: 15px; margin-right: 20px">
              edit
          </button>
          <hr width="700" size="5" >
     </div><br>
    {{/for}}

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменение данных</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="contactEditForm">
                        <input type="hidden" name="action" value="SendForm">
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="email" id="contactEdit-email" class="form-control">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="text" name="name" id="contactEdit-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="subject" id="contactEdit-subject" class="form-control">
                        </div>
                        <div class="text-center"><button type="submit" style="margin-top: 50px" class="btn btn-danger">Отправить сообщение</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".btn-edit").click(
            function() {
                $("#contactEdit-email").val($(this).attr('data-email'));
                $("#contactEdit-name").val($(this).attr('data-name'));
                $("#contactEdit-subject").val($(this).attr('data-subject'));
                $("#contactEdit-id").val($(this).attr('data-id'));
                $("#exampleModal").modal("show");
            }
        );

        $("#contactEditForm").submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            let postData = {};
            formData.forEach((item) => {
                postData[item.name] = item.value;
            });

            $.post({
                url: "/postcontact/index",
                data: postData,
                success: function(data){
                    try {
                        let res = (typeof data === 'object') ? data : JSON.parse(data);
                        if(res.result == "success") {
                            window.location = "/postcontact/index";
                        }
                    } catch(error) {
                        alert(error.message);
                    }
                }
            })
        });
    </script>
</main>
</component>
