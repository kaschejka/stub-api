      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
              <br>
              <form  action="/notifGet" method="post" enctype="multipart/form-data">
                @csrf
                <lable>ОТ&nbsp&nbsp</lable>
                <input type="datetime-local" name="ot" class="form-control">
                <lable>ДО&nbsp&nbsp</lable>
                <input type="datetime-local" name="do" class="form-control">
                <br>
                <br>
                  <div class="form-group">
                  <button type="submit" class="btn btn-success">Показать</button>
                </div>



              </form>
            </div>
            <lable>________________________________________________________</lable>
            <br>
            <br>
            <form  action="/notifDel" method="post" enctype="multipart/form-data">
              @csrf
              <lable>ОТ&nbsp&nbsp</lable>
              <input type="datetime-local" name="otdel" class="form-control">
              <lable>ДО&nbsp&nbsp</lable>
              <input type="datetime-local" name="dodel" class="form-control">
              <br>
              <br>
                <div class="form-group">
                <button type="submit" class="btn btn-success">Удалить записи из БД</button>
              </div>

            </form>

        </div>
    </div>
