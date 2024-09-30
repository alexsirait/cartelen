<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>


<div id="showUser"></div>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Add Donkk
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <body>
                <form action="/simpan_user" class="p-4">

                    <div class="form-group">
                      <label>name</label>
                      <input type="text" class="form-control" name="name" id="idname">
                    </div>

                    <div class="form-group">
                        <label>hp</label>
                        <input type="text" class="form-control" name="hp" id="idhp">
                    </div>

                    <div class="form-group">
                        <label>id</label>
                        <input type="text" class="form-control" name="id" id="idid">
                    </div>

                    <button type="button" id="submituser" class="btn btn-primary">Submit</button>
                </form>
            </body>
        </div>
      </div>
    </div>
  </div>
</body>

  {{-- modal edit --}}
  <!-- Modal -->
  <div class="modal fade" id="modalAkinEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <body>
                <form action="/update_user" class="p-4">
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="id" id="idyangdisembunyikan">
                      <input type="text" class="form-control" name="name" id="namayangakandiedit">
                      <input type="text" class="form-control" name="hp" id="jenisyangakandiedit">
                    </div>
                    <button type="button" id="submiteditakin" class="btn btn-primary">Submit</button>
                </form>
            </body>
        </div>
      </div>
    </div>
  </div>


</body>
<script>

    function showUser() {
        $.ajax({
            url: `/showUser`,
            method: 'GET',
        }).done(res => {
            $('#showUser').html(res);
        })
    }

    showUser();
    $(document).on('click', '#submituser', function (e) {
        $.ajax({
            type: "GET",
            url: `/simpan_user`,
            data: {
                name:   $("#idname").val(),
                hp:   $("#idhp").val(),
                id:   $("#idid").val(),
            },
            dataType: "JSON",
            success: function (RES) {
                if (RES == 'SUCCESS') {
                    $('#staticBackdrop').modal('hide');
                    showUser();
                }
            }
        });
    });

    $(document).on('click', '.inibutonakinuntukbukamodal', function (e) {
        $("#modalAkinEdit").modal('show');

        $("#idyangdisembunyikan").val($(this).data('id'));
        $("#namayangakandiedit").val($(this).data('name'));
        $("#jenisyangakandiedit").val($(this).data('hp'));

        $(document).on('click', '#submiteditakin', function (e) {
            $.ajax({
                type: "GET",
                url: `/update_user`,
                data: {
                    id:   $("#idyangdisembunyikan").val(),
                    name:   $("#namayangakandiedit").val(),
                    hp:   $("#jenisyangakandiedit").val(),
                },
                dataType: "JSON",
                success: function (RES) {
                    if (RES == 'SUCCESS') {
                        $('#modalAkinEdit').modal('hide');
                        showUser();
                    }
                }
            });
        });
    });


    $(document).on('click', '.iniadalahbuttonuntukmelakukandelete', function (e) {
        $.ajax({
            type: "GET",
            url: `/deleteuser`,
            data: {
                id:   $(this).data('id'),
            },
            dataType: "JSON",
            success: function (RES) {
                if (RES == 'SUCCESS') {
                    showUser();
                }
            }
        });
    });
</script>
</script>
</html>
