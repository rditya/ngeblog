@extends('layouts.admin')

@section('admin')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Article</h1>
</div>


    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-inline-block">
            <h6 class="m-0 font-weight-bold text-primary">Add New Article</h6>
                
        </div>
    </div>

    <div class="card-body">
        <div class="post">
            <form action="{{route('simpan-artikel')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <textarea id="tambah-artikel" class="form-control" name="article" rows="10" cols="50"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category" id="">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tag</label>
                    <select class="form-control select2" multiple="" name="tag[]">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <label for="" class="radio-inline"><input type="radio" name="status" value="publish" id=""> Publish</label>
                    <label for="" class="radio-inline"><input type="radio" name="status" value="draft" id=""> Draft</label>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="send">
                        </div>
                    </div>
                    <div class="col-md-8 text-right">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Publish">
                            <input type="submit" class="btn btn-danger" value="Draft">
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<script>
  var add = document.getElementById("tambah-artikel");
    CKEDITOR.replace('article',{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection