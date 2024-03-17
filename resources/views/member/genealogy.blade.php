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

<div class="content-wrapper" style="background-image: url('../login_bg2.jpg'); background-size:     cover;                      
background-repeat:   no-repeat;
background-position: center center; color: white;">
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
    <li><code><img height="100px" src="../user.png"> <br>{{ $params['head']->upline }}</code>
      <ul>
        @if($params['head']->first != "")
        <li><code><img height="70px" width="70px" width="10px" src="../user.png"> <br><a href="/member/genealogy?username={{ $params['head']->first }}">{{ $params['head']->first }}</a></code>
          {{-- <ul>
            @if($params['first']->first != "")
            <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['first']->first }}">{{ $params['first']->first }}</a></code></li>
            @else
            <li><code>Empty</code></li>
            @endif
            @if($params['first']->second != "")
            <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['first']->second }}">{{ $params['first']->second }}</a></code></li>
            @else
            <li><code>Empty</code></li>
            @endif
            @if($params['first']->third != "")
            <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['first']->third }}">{{ $params['first']->third }}</a></code></li>
            @else
            <li><code>Empty</code></li>
            @endif
            @if($params['first']->fourth != "")
            <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['first']->fourth }}">{{ $params['first']->fourth }}</a></code></li>
            @else
            <li><code>Empty</code></li>
            @endif
          </ul> --}}
        </li>
        @else
        <li><code><img height="70px" width="70px" src="../user.png"> <br>Empty</code>
            {{-- <ul>
              <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
              <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
              <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
              <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
            </ul> --}}
          </li>
        @endif
        @if($params['head']->second != "")
        <li><code><img height="70px" width="70px" src="../user.png"> <br><a href="/member/genealogy?username={{ $params['head']->second }}">{{ $params['head']->second }}</a></code>
            {{-- <ul>
                @if($params['second']->first != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['second']->first }}">{{ $params['second']->first }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['second']->second != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['second']->second }}">{{ $params['second']->second }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['second']->third != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['second']->third }}">{{ $params['second']->third }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['second']->fourth != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['second']->fourth }}">{{ $params['second']->fourth }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
            </ul> --}}
          </li>
          @else
            <li><code><img height="70px" width="70px" src="../user.png"> <br>Empty</code>
                {{-- <ul>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                </ul> --}}
            </li>
          @endif
          @if($params['head']->third != "")
          <li><code><img height="70px" width="70px" src="../user.png"> <br><a href="/member/genealogy?username={{ $params['head']->third }}">{{ $params['head']->third }}</a></code>
            {{-- <ul>
                @if($params['third']->first != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->first }}">{{ $params['third']->first }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['third']->second != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->second }}">{{ $params['third']->second }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['third']->third != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->third }}">{{ $params['third']->third }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['third']->fourth != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->fourth }}">{{ $params['third']->fourth }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
            </ul> --}}
          </li>
          @else
            <li><code><img height="70px" width="70px" src="../user.png"> <br>Empty</code>
                {{-- <ul>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                </ul> --}}
            </li>
          @endif
          @if($params['head']->fourth != "")
          <li><code><img height="70px" width="70px" src="../user.png"> <br><a href="/member/genealogy?username={{ $params['head']->fourth }}">{{ $params['head']->fourth }}</a></code>
            {{-- <ul>
                @if($params['third']->first != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->first }}">{{ $params['third']->first }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['third']->second != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->second }}">{{ $params['third']->second }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['third']->third != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->third }}">{{ $params['third']->third }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
                @if($params['third']->fourth != "")
                <li><code><img height="100px" src="../user.png"> <br><a href="/genealogy?username={{ $params['third']->fourth }}">{{ $params['third']->fourth }}</a></code></li>
                @else
                <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                @endif
            </ul> --}}
          </li>
          @else
            <li><code><img height="70px" width="70px" src="../user.png"> <br>Empty</code>
                {{-- <ul>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                    <li><code><img height="100px" src="../user.png"> <br>Empty</code></li>
                </ul> --}}
            </li>
          @endif
          
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



