@extends('layout')
@section('content')
<style>
    

    /* It's supposed to look like a tree diagram */
    .tree, .tree ul, .tree li {
        list-style: none;
        margin: 0;
        padding: 0;
        position: relative;
    }
    
    .tree {
        margin: 0 0 1em;
        text-align: center;
    }
    .tree, .tree ul {
        display: table;
    }
    .tree ul {
      width: 100%;
    }
        .tree li {
            display: table-cell;
            padding: .5em 0;
            vertical-align: top;
        }
            /* _________ */
            .tree li:before {
                outline: solid 1px #666;
                content: "";
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
            }
            .tree li:first-child:before {left: 50%;}
            .tree li:last-child:before {right: 50%;}
    
            .tree code, .tree span {
                border: solid .1em #666;
                border-radius: .2em;
                display: inline-block;
                margin: 0 .2em .5em;
                padding: .2em .5em;
                position: relative;
            }
            /* If the tree represents DOM structure */
            .tree code {
                font-family: monaco, Consolas, 'Lucida Console', monospace;
            }
    
                /* | */
                .tree ul:before,
                .tree code:before,
                .tree span:before {
                    outline: solid 1px #666;
                    content: "";
                    height: .5em;
                    left: 50%;
                    position: absolute;
                }
                .tree ul:before {
                    top: -.5em;
                }
                .tree code:before,
                .tree span:before {
                    top: -.55em;
                }
    
    /* The root node doesn't connect upwards */
    .tree > li {margin-top: 0;}
        .tree > li:before,
        .tree > li:after,
        .tree > li > code:before,
        .tree > li > span:before {
          outline: none;
        }
      </style>

<div class="content-wrapper" style="background-color: black; color: white;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Genealogy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Genealogy</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <figure>
  <!-- <figcaption>Example DOM structure diagram</figcaption> -->
  <ul class="tree" style="width: 100%;">
    <li><span><img height="100px" src="../user.png"> <br> Root</span>
      <ul>
        <li>
            <span><img height="100px" src="../user.png"> <br> head</span>
        </li>
        <li>
            <span><img height="100px" src="../user.png"> <br> head</span>
        </li>
        <li>
            <span><img height="100px" src="../user.png"> <br> head</span>
        </li>
        <li>
            <span><img height="100px" src="../user.png"> <br> head</span>
        </li>
        <li>
            <span><img height="100px" src="../user.png"> <br> head</span>
        </li>
      </ul>
    </li>
  </ul>
</figure>

      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>

  
  
@endsection()



