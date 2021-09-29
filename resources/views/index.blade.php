@extends('default')
<style>
  body {
    background: skyblue;
    max-width: 700px;
    margin: 0 auto;
  }
  h1 {
    width: 10em;
    font-weight: normal;
    color: white;
    text-align: center;
    margin: 10px auto 0 auto;
    border-bottom: 2px solid white;
  }
  div {
    margin: 25px auto 0 auto;
    background: white;
    height: 100vh;
    border-radius: 15px;
  }
  table {
    max-width: 1000px;
    height: auto;
    table-layout: fixed;
    margin: 0 auto;
    border-collapse: collapse;
  }
  td {
    border: 2px solid skyblue;
    padding: 8px;
    color: skyblue;
  }
  th {
    color: skyblue;
    padding: 2em 2em 0.8em 2em;
  }
  .create-form {
    display: flex;
    justify-content: center;
  }
  .input-add {
    border: solid skyblue;
    width: 50%;
    height: 36px;
    margin-top: 25px;
    border-radius: 8px 0 0 8px;
  }
  .create-btn {
    height: 36px;
    color: white;
    background: skyblue;
    border: skyblue;
    margin-top: 25px;
    width: 48px;
    border-radius: 0 8px 8px 0;
  }

  .btn-delete {
    color: white;
    background: skyblue;
    border: none;
    margin: 0;
  }
  .btn-update {
    color: white;
    background: skyblue;
    border: none;
  }
  form {
    margin-bottom: 0;
  }
  .border-none {
    background: skyblue;
    border: white 2px solid;
    border-radius: 2px;
  }
  a {
    display: block;
    color: white;
    background: skyblue;
    padding: 20px;
    border-radius: 5px;
    width: 5em;
    margin: 50px auto 0 auto;
  }
  .form-update {
    color: skyblue;
    border: none;
    width: 60px;
    font-size: 16px;
  }
  .form-name {
    color: skyblue;
    border: none;
    width: 6em;
    font-size: 16px;
  }
  .form-date {
    width: 10em;
    color: skyblue;
    border: none;
    font-size: 16px;
  }
  .checkbox {
    padding: 0;
    margin: 0;
    align-items: center;
    text-align: center;
  }
</style>
@section('title', 'index.blade.php')

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
<h1>
  冷蔵庫　在庫管理
</h1>
<div>
  <table>
    <tr class="midasi">
      <!-- <th class="check-th">check</th> -->
      <th>食品名</th>
      <th>個数</th>
      <th>賞味期限</th>
      <th>メモ</th>
    </tr>

    
    @foreach($items as $item)
    <tr>
      <!-- <form action="{{ route('fridge.delete', ['id' => $item->id]) }}" method="post">
        @csrf
        
        <td class="check-box">
          <input type="checkbox" name="checked[]" value="{{$item->id}}">
        </td> -->
        
        <form action="{{ route('fridge.update' , ['id' => $item->id]) }}" method="post">
          @csrf
          <td>
            <input type="text" value="{{ $item->name }}" class="form-update form-name" name="name">
          </td>
          <td>
            <input type="text" value="{{ $item->quantity }}" class="form-update" name="quantity">
          </td>
          <td>
            <input type="date" value="{{ $item->expiry_date }}" class="form-date" name="expiry_date">
          </td>
          <td>
            <input type="text" value="{{$item->memo}}" class="form-name" name="memo">
          </td>
          
          <!-- <form action="{{ route('fridge.update' , ['id' =>   $item->id]) }}" method="post">
            @csrf -->
            <td class="border-none updated-at">
              <button class="btn-update">更新</button>
            </td>
          </form>
          
          <td class="border-none">
            <form action="{{ route('fridge.delete', ['id' => $item->id]) }}" method="post">
              @csrf
              <button class="btn-delete">消費</button>
            </form>
          </td>

          @endforeach
          <!-- <button class="btn-delete">消費</button> -->
        </form>
        </tr>
      </table>
    <a href="/add">納品画面へ</a>
  </div>
  
@endsection