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
        <form method="post" action="/owner/image/form" enctype="multipart/form-data"> 
        @csrf
        <tr><th>name:
            </th><td><input type="text" name="name"></td></tr>
        <tr><th>price:
            </th><td><input type="text" name="price"></td></tr>
        <tr><th>type:
            </th><td><input type="number" name="type"></td></tr>
            <p>&nbsp;</p>
    <p>画像をアップロード</p>
    <input type="file" name="image">
    <p>&nbsp;</p>
            <input type="submit" class="submitbtn">
   </form>
   </table>
   <a href="./index">商品を見る</a>
   