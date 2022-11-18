<component name="common.page.document">

<main id="main">

<component name="components.breadcrumbs" $text1="Проверка данных"/>

     <h2 style="margin-bottom: 25px; margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     {{for $rows as $row}}
     <div class="row record-row border-bottom border-top p-3 mb-2" data-id="{{$row.id}}">
        <div class="col-1 record-id"><strong>{{$row.id}}</strong></div>
        <div class="col-2 record-email">{{$row.email}}</div>
        <div class="col-2 record-name">{{$row.name}}</div>
        <div class="col-5 record-subject">{{$row.subject}}</div>
        <div class="col-2">
            <button type="button" class="btn btn-edit w-100 btn-primary btn-sm">edit</button>
        </div>
     </div>
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
                        <input type="hidden" id="contactEdit-id" name="id" value="">
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
                let row = $(this).closest(".record-row");
                $("#contactEdit-email").val(row.find(".record-email").text());
                $("#contactEdit-name").val(row.find(".record-name").text());
                $("#contactEdit-subject").val(row.find(".record-subject").text());
                $("#contactEdit-id").val(row.find(".record-id").text());
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
                            let row = $('.record-row[data-id="'+postData['id']+'"]');
                            row.find(".record-email").text(postData['email']);
                            row.find(".record-subject").text(postData['subject']);
                            row.find(".record-name").text(postData['name']);
                            $("#exampleModal").modal("hide");
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
