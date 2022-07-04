<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>control panel</title>
    <style>
      * {
        box-sizing: border-box;
      }

      h1 {
        text-align: center;
        margin-top: 50px;
      }

      /*検索フォーム*/

      .search-form {
        width: 90%;
        margin: 0 auto;
        border: 1px solid #000;
        padding: 30px;
        margin-bottom: 30px;
      }

      label {
        display: inline-block;
        width: 150px;
        font-weight: bold;
      }

      .search-form input {
        padding: 10px;
        border: 1px solid #C0C0C0;
        border-radius: 5px;
      }

      input[type="text"], input[type="date"]  {
        width: 300px;
        margin: 0 20px;
        cursor: pointer;
      }

      .gender {
        width: 50px;
        margin-left: 50px;
      }

      input[type="radio"] {
        transform: scale(3);
        margin: 0 20px 0 40px;
        cursor: pointer;
      }

      .btn {
        text-align: center;
      }

      .search-btn {
        padding: 10px 50px;
        margin: 20px 0 10px;
        background: black;
        border-radius: 5px;
        color: white;
        cursor: pointer;
      }

      .clear-btn {
        border: none;
        background: none;
        color: black;
        cursor: pointer;
      }

      /*問い合わせ一覧*/

      svg.w-5.h-5 {
      width: 30px;
      height: 30px;
      }

      .inquiry-list {
        width: 90%;
        margin: 0 auto;
      }

      table {
        width: 100%;
      }

      th {
        font-weight: bold;
        text-align: left;
        padding-bottom: 10px;
        border-bottom: 1px solid black;
      }

      .tag1, .tag3 {
        width: 10%;
      }

      .tag2 {
        width: 15%;
      }
      .tag5 {
        width: 35%;
      }

      .wrapper {
        position: relative;
      }

      .hide {
        position: absolute;
        visibility: collapse;
      }

      .wrapper:hover .hide {
        visibility: visible;
      }

      .wrapper:hover .show {
        display: none;
      }

      .delete-btn {
        padding: 0 20px;
        background: black;
        border-radius: 5px;
        color: white;
        cursor: pointer;
      }

    </style>
  </head>

  <body>
    <h1>管理システム</h1>
    <div class="search-form">
      <form action="/" method="get">
        @csrf
        <div class="form-item">
          <label for="fullname">お名前</label>
            <input type="text" name="search_name" value="{{ $search_name }}">
          <label class="gender" for="gender">性別</label>
            <input type="radio" name="search_gender" value="すべて" checked>すべて
            <input type="radio" name="search_gender" value="男性">男性
            <input type="radio" name="search_gender" value="女性">女性
        </div>
          <br />
        <div class="form-item">
          <label for="created_at">登録日</label>
            <input type="date" name="from" placeholder="from_date">
              <span>~</span>
            <input type="date" name="until" placeholder="until_date">
        </div>
          <br />
        <div class="form-item">
          <label for="email">メールアドレス</label>
            <input type="text" name="search_email" value="{{ $search_email }}">
        </div>
        <div class="btn">
          <button type="submit" class="search-btn">検索</button>
        </div>
        <div class="btn">
          <button class="clear-btn">
            <a href="/">リセット</a>
          </button>
        </div>
      </form>
    </div>

    <div class="inquiry-list">
      {{ $items->appends(request()->query())->links() }}
      <table>
        <tr class="tag-wrap">
          <th class="tag1">ID</th>
          <th class="tag2">お名前</th>
          <th class="tag3">性別</th>
          <th class="tag4">メールアドレス</th>
          <th class="tag5">ご意見</th>
          <th></th>
        </tr>
        @foreach ($items as $item)
        <tr>
          <td class="tag1">
            {{ $item->id }}
          </td>
          <td class="tag2">
            {{ $item->fullname }}
          </td>
          <td class="tag3">
            {{ $item->gender }}
          </td>
          <td class="tag4">
            {{ $item->email }}
          </td>
          <td class="tag5">
            <div class="wrapper">
              <div class="show">
                {{ Str::limit($item->opinion, 25, '...') }}
              </div>
              <div class="hide">
                {{ $item->opinion }}
              </div>
            </div>
          </td>
          <form action="/delete/{{ $item->id }}" method=post">
            @csrf
            <td>
              <input type="submit" class="delete-btn" value="削除">
            </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </body>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
</html>