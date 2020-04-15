<form action="/store-post" method="post">

    @csrf

    <input type="text" name="title" id="title">
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
    <button>Save Post</button>
</form>