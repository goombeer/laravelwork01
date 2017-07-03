<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
<!-- Bootstrap の定形コード... -->
    <div class="panel-body">
<!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
<!-- バリデーションエラーの表示に使用-->
    <div class="form-group">
        <label for="book" class="col-sm-3 control-label">デート場所投稿</label>
    </div>
        <form action="{{ url('users') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
 <div class="col-sm-6">
     場所<select name="place" id="place" class="form-control">
        <option value="東京">東京</option>
        <option value="神奈川">神奈川</option>
        <option value="千葉">千葉</option>
        <option value="埼玉">埼玉</option>
     </select>
 </div>
 <div class="col-sm-6">
    店・施設の名前<input type="text" name="shop_name" id="shop_name" class="form-control">
 </div>
  <div class="col-sm-6">
    URL<input type="text" name="url" id="url" class="form-control">
 </div>
  <div class="col-sm-6">
    付き合ってどのくらいで利用したか<select name="who" id="who" class="form-control">
        <option value="交際する前">交際する前</option>
        <option value="１ヶ月〜半年">１ヶ月〜半年</option>
        <option value="半年〜1年">半年〜1年</option>
        <option value="１年〜3年">１年〜3年</option>
        <option value="１年〜3年">3年以上</option>
    </select>
 </div>
  <div class="col-sm-6">
    どういった用途で使用したか<select name="how" id="how" class="form-control">
        <option value="デート">デート</option>
        <option value="別れ話をする時">別れ話をする時</option>
        <option value="プロポーズをする時">プロポーズをする時</option>
        <option value="相談事をする時">相談事をする時</option>
        <option value="知人を含めて会う時">知人を含めて会う時</option>
        <option value="両親に合わせる時">両親に合わせる時</option>
        <option value="復縁をお願いした時">復縁をお願いした時</option>
    </select>
 </div>
   <div class="col-sm-6">
    感想・評価<input type="text" name="impression" id="impression" class="form-control">
   </div>
</div>
            <div class="form-group" id="save">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
</div>
@if (count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">登録されているデート場所 </div>
            <div class="panel-body　table-responsive ">
                <table class="table table-striped task-table" style="table-layout:fixed;">
                    <!-- テーブルヘッダ -->
                    <thead> 
                    <th class="article">場所</th>
                    <th class="article">店・施設名</th>
                    <th class="article">URL</th>
                    <th class="article">誰と利用したか</th>
                    <th class="article">どういった用途で使用したか</th>
                　　<th class="article">感想</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                    <tr class="data">
                                <td class="table-text">
                                    <div>{{ $user->place }}</div>
　　　　　　　　　　　　　　　　</td>
　　　　　　　　　　　　　　　　 <td class="table-text">
                                    <div>{{ $user->shop_name }}</div>
　　　　　　　　　　　　　　　　</td>
　　　　　　　　　　　　　　　　 <td class="table-text">
                                    <div><a herf="{{$user->url}}">{{$user->url}}</a></div>
　　　　　　　　　　　　　　　　</td>
　　　　　　　　　　　　　　　　 <td class="table-text">
                                    <div>{{ $user->who }}</div>
　　　　　　　　　　　　　　　　</td>
　　　　　　　　　　　　　　　　 <td class="table-text">
                                    <div>{{ $user->how }}</div>
　　　　　　　　　　　　　　　　</td>
　　　　　　　　　　　　　　　　<td class="table-text">
                                    <div>{{ $user->impression }}</div>
　　　　　　　　　　　　　　　　</td>
                                <td>
                                    <form action="{{ url('delete/'.$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>削除
                                        </button>
                                    </form>
                                </td> 
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection