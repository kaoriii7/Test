@extends('layouts.app')
<style>
  * {
    box-sizing: border-box;
  }

  table {
    width: 80%;
    margin: 0 auto;
  }

  th {
    font-size: 22px;
    width: 150px;
    text-align: left;
    font-weight: bold;
  }

  .sample-td {
    display: inline-block;
    font-size: 22px;
    color: #CCCCCC;
    margin-left: 50px;
  }

  .asterisk {
    color: red;
  }

  .g-label {
    font-size: 22px;
  }
  .postcode {
    display: flex;
  }

  .postcode p {
    font-size: 30px;
    margin-left: 30px;
    margin-right: 30px;
  }

  .postcode input {
    margin: 0;
  }

  input[type="text"], input[type="email"], textarea  {
    width: 100%;
    margin: 20px;
    padding: 20px;
    border: 1px solid #C0C0C0;
    border-radius: 5px;
    font-size: 22px;
    cursor: pointer;
    }

  input[type="radio"] {
    transform: scale(3);
    margin: 20px 20px 20px 40px;
    cursor: pointer;
  }

  .btn {
    text-align: center;
  }

  button {
    margin-top: 20px;
    padding: 10px 60px;
    background: black;
    border-radius: 5px;
    color: white;
    font-size: 22px;
    cursor: pointer;
  }

</style>

@section('title', 'お問い合わせ')

@section('content')
<div>
  <form action="/contacts/confirm" method="post">
  @csrf
    <table>
      <tr>
        <th>お名前<span class="asterisk">※</span></th>
        <td class="g-td">
          <input type="text" name="fullname" value="{{ old('fullname') }}"><br />
          @if ($errors->has('fullname'))
          <span class="help-block">
            <strong>{{ $errors->first('fullname') }}</strong>
          </span>
          @endif
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="sample-td">例）山田　太郎</td>
      </tr>
      <tr>
        <th>性別<span class="asterisk">※</span></th>
        <td>
          <label class="g-label">
            <input type="radio" name="gender" value="男性" {{ old('gender')== '男性' ? 'checked': '' }} checked required>男性
            <input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked': '' }}>女性
          </label>
          <br />
          @if ($errors->has('gender'))
          <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
          </span>
          @endif
        </td>
      </tr>
      <tr>
        <th>メールアドレス<span class="asterisk">※</span></th>
        <td>
          <input type="email" name="email" value="{{ old('email') }}"><br />
          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="sample-td">例）test@example.com</td>
      </tr>
      <tr>
        <th>郵便番号<span class="asterisk">※</span></th>
        <td class="postcode">
          <p>〒</p><input type="text" pattern="\d{3}-\d{4}" name="zip11" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" value="{{ old('zip11') }}"><br />
          @if ($errors->has('zip11'))
          <span class="help-block">
            <strong>{{ $errors->first('zip11') }}</strong>
          </span>
          @endif
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="sample-td">例）123-4567</td>
      </tr>
      <tr>
        <th>住所<span class="asterisk">※</span></th>
        <td>
          <input type="text" name="addr11" size="60" value="{{ old('addr11') }}"><br />
          @if ($errors->has('addr11'))
          <span class="help-block">
            <strong>{{ $errors->first('addr11') }}</strong>
          </span>
          @endif
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="sample-td">例）東京都渋谷区千駄ヶ谷1-2-3</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          <input type="text" name="builging_name" value="{{ old('builging_name') }}"><br />
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="sample-td">例）千駄ヶ谷マンション101</td>
      </tr>
      <tr>
        <th>ご意見<span class="asterisk">※</span></th>
        <td>
          <textarea name="opinion" id="opinion" cols="30" rows="4">{{ old('opinion') }}</textarea><br />
          @if ($errors->has('opinion'))
          <span class="help-block">
            <strong>{{ $errors->first('opinion') }}</strong>
          </span>
          @endif
        </td>
      </tr>
    </table>
    <div class="btn">
      <button type="submit" name="button" value="確認">確認</button>
    </div>
</form>

</div>
@endsection