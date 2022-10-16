@extends('layout.layout')

@section('contents')

@php 
    if (isset($_GET['publish'])){
        $title          =   $_GET['title'];
        $description    =   $_GET['description'];
        $author         =   $_GET['author'];
        $author_img     =   $_GET['author_img'];
        $category       =   $_GET['category'];
        $read_count     =   $_GET['read_count'];
        $thumbnail      =   $_GET['thumbnail'];

        $slug = explode(" ", $title);
        $slug = implode("-", $slug);

        $posts = DB::table('posts')->insert([
            'thumbnail'     => $thumbnail,
            'title'         => $title,
            'description'   => $description,
            'author'        => $author,
            'author_img'    => $author_img,
            'category'      => $category,
            'read_count'    => $read_count,
            'slug'          => $slug,
        ]);

        if($posts === true) {
            $success = 'Post added successfully';
        } else {
            $error = 'Post could not be added.';
        }
    }
@endphp

<div class="container my-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            
            @if(isset($success))
                <div class="alert alert-success">{{ $success }}</div>
            @endif

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <form class="card" action="{{ url('add-post')}}" method="GET">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Create Post</h4>
                    <input class="btn btn-success" type="submit" value="Publish" name="publish">
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Post title">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Content</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control" placeholder="Type something..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" id="author" class="form-control" name="author" placeholder="Author name">
                            </div>

                            <div class="mb-3">
                                <label for="author-img" class="form-label">Author image</label>
                                <input type="text" id="author-img" class="form-control" name="author_img" placeholder="Author image link">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" id="category" class="form-control" name="category" placeholder="Category name">
                            </div>

                            <div class="mb-3">
                                <label for="read-count" class="form-label">Post view</label>
                                <input type="number" id="read-count" class="form-control" name="read_count" placeholder="View count" value="1">
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Post thumbnail</label>
                                <input type="text" id="thumbnail" class="form-control" name="thumbnail" placeholder="Post thumbnail link">
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
