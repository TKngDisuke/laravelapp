@if (count($errors) > 0)
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
   <table>
        <form method="post" action="/owner/store/form" > 
        @csrf
        <tr><th>name:
            </th><td><input type="text" name="name"></td></tr>
        <tr><th>address:
            </th><td><input type="text" name="adress"></td></tr>
        <tr><th>time:
            </th><td><input type="text" name="time"></td></tr>
        <tr><th>phone:
            </th><td><input type="text" name="phone"></td></tr>
        <tr><th>MOtime:
            </th><td><input type="text" name="MOtime"></td></tr>
        <tr><th>audience_seat:
            </th><td><input type="number" name="audience_seat"></td></tr>
        <tr><th>parking:
            </th><td><input type="number" name="parking"></td></tr>
            <tr><th>others:
            </th><td><input type="text" name="others"></td></tr>
            <input type="submit" class="submitbtn">
   </form>
   </table>
   <a href="./">店舗一覧を見る</a>
   