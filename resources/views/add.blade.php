@extends('default')
<style>
  body {
    background: skyblue;
  }
  table {
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    width: 80%;
    max-width: 750px;
    margin: 10px auto 0 auto;
    padding: 15px;
    border-radius: 10px;
  }
  h1 {
    color: white;
    text-align: center;
    width: 4em;
    padding: 5px;
    margin: 25px auto 25px auto;
    border-bottom: 2px solid white;
  }
  th {
    background: white;
    color: skyblue;
    padding: 0 40px 0 40px;
  }
  td {
    padding: 25px 40px;
    background: white;
    text-align: center;
  }
  input {
    padding: 5px;
  }
  button {
    padding: 10px 20px;
    background: skyblue;
    border: none;
    color: white;
    width: 150px;
    margin: 0 auto 0 auto;
    border-radius: 2px;
  }
  input {
    border-color: skyblue;
  }
  a {
    display: block;
    background: white;
    color: skyblue;
    padding: 20px;
    border-radius: 5px;
    width: 7em;
    margin: 25px auto 0 auto;
  }
</style>
@section('title', 'add.blade.php')

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif

<form action="/add" method="POST">
<h1>
  納品
</h1>
<table>
  @csrf
  <tr>
    <th>食品名</th>
    <td>
      <input type="text" name="name">
    </td>
  </tr>
  <tr>
    <th>個数</th>
    <td>
      <input type="text" name="quantity">
    </td>
  </tr>
  <tr>
    <th>賞味期限</th>
    <td>
      <input type="date" name="expiry_date">
    </td>
  </tr>
  <tr>
    <th>メモ</th>
    <td>
      <input type="text" name="memo">
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <button>送信</button>
    </td>
  </tr>
</table>
</form>
<a href="/">在庫管理画面へ</a>
@endsection