@extends('layouts.app')
<style>
  * {
    box-sizing: border-box;
    font-size: 22px;
    font-weight: bold;
  }

  .container {
    margin-top: 500px;
  }

  p, .btn {
    text-align: center;
  }

  button {
    margin-top: 100px;
    padding: 10px 60px;
    background: black;
    border-radius: 5px;
    color: white;
    font-size: 22px;
    cursor: pointer;
  }
</style>

@section('content')
<div class="container">
  <p>ご意見いただきありがとうございました。</p>
  <div class="btn">
    <button type="submit">トップページへ</button>
  </div>
</div>
@endsection