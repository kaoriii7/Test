@extends('layouts.app')
<style>
  * {
    box-sizing: border-box;
  }

  table {
    width: 80%;
    margin: 0 auto;
  }

  th, td {
    padding: 30px 0;
    font-size: 22px;
    text-align: left;
  }

  th {
    width: 300px;
  }

  .send-btn {
    text-align: center;
    cursor: pointer;
  }

  .send-btn input {
    margin-top: 20px;
    padding: 10px 60px;
    background: black;
    border-radius: 5px;
    color: white;
    font-size: 22px;
  }

  .revision-btn {
    text-align: center;
    cursor: pointer;
  }

  .revision-btn input {
    background: none;
    border: none;
    font-size: 22px;
  }

</style>

@section('title', '内容確認')

@section('content')
<div>
  <form action="/contacts/thanks" method="post">
    @csrf

    <table>
      <tr>
        <th>お名前</th>
        <td>
          {{ $contact->fullname }}
        </td>
        <input type="hidden" name="fullname" value="{{ $contact->fullname }}">
      </tr>
      <tr>
        <th>性別</th>
        <td>
          {{ $contact->gender }}
        </td>
        <input type="hidden" name="gender" value="{{ $contact->gender }}">
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          {{ $contact->email }}
        </td>
        <input type="hidden" name="email" value="{{ $contact->email }}">
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>
          〒{{ $contact->zip11 }}
        </td>
        <input type="hidden" name="zip11" value="{{ $contact->zip11 }}">
      </tr>
      <tr>
        <th>住所</th>
        <td>
          {{ $contact->addr11 }}
        </td>
        <input type="hidden" name="addr11" value="{{ $contact->addr11 }}">
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          {{ $contact->builging_name }}
        </td>
        <input type="hidden" name="builging_name" value="{{ $contact->builging_name }}">
      </tr>
      <tr>
        <th>ご意見</th>
        <td>
          {{ $contact->opinion }}
        </td>
        <input type="hidden" name="opinion" value="{{ $contact->opinion }}">
      </tr>
    </table>
    
    <div class="send-btn">
      <input type="submit" name="action" value="送信" class="btn btn-primary">
    </div>
    <div class="revision-btn">
      <input type="submit" name="action" value="修正する" class="btn">
    </div>
  </form>
</div>
@endsection