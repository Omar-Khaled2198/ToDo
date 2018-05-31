<!DOCTYPE html>
<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        body {
        background: #27415c;
        color: #333;
        font-family: Lato, sans-serif;
        }
        .container {
        background-color: #fff;
        display: block;
        width: 420px;
        margin: 30px auto 0;
        padding: 50px;
        border-radius: 5px;
        box-shadow: 0 1px 20px rgba(0,0,0,.4);
        }
        ul {
        margin: 0;
        padding: 0;
        }
        li * {
        float: left;
        }
        li, h3 {
        clear:both;
        list-style:none;
        }
        input, button {
        outline: none;
        }
        button,a {
        background: none;
        border: 0px;
        color: #888;
        font-size: 15px;
        width: 58px;
        margin: 10px 0 0;
        font-family: Lato, sans-serif;
        cursor: pointer;
        text-decoration: none;
        }
        button:hover {
        color: #333;
        }
        label
        {
          word-break: break-all;
        }
        /* Heading */
        h3,
        label[for='new-task'] {
        color: #333;
        font-weight: 700;
        font-size: 15px;
        border-bottom: 2px solid #333;
        padding: 30px 0 10px;
        margin: 0;
        text-transform: uppercase;
        }
        input[type="text"] {
        margin: 0;
        font-size: 18px;
        line-height: 18px;
        height: 18px;
        padding: 10px;
        border: 1px solid #ddd;
        background: #fff;
        border-radius: 6px;
        font-family: Lato, sans-serif;
        color: #888;
        }
        input[type="text"]:focus {
        color: #333;
        }

        /* New Task */
        label[for='new-task'] {
        display: block;
        margin: 0 0 20px;
        }
        input#new-task {
        float: left;
        width: 318px;
        }
        p > button:hover {
        color: #0FC57C;
        }

        /* Task list */
        li {
        overflow: hidden;
        padding: 5px 0;
        border-bottom: 1px solid #eee;
        }
        li > label {
        font-size: 18px;
        line-height: 40px;
        width: 300px;
        padding: 0 0 0 11px;
        }
        form > input[type="checkbox"] {
        margin: 0 10px;
        position: relative;
        top: 10px;
        }
        li >  input[type="text"] {
        width: 226px;
        }
        li > .delete:hover {
        color: #CF2323;
        }

        li> .complete:hover{
          color: #0FC57C;
        }

        li> .edit:hover{
          color: blue;
        }

        /* Completed */
        #completed-tasks label {
        text-decoration: line-through;
        color: #888;
        }

        /* Edit Task */
        ul li input[type=text] {
        display:none;
        }

        ul li.editMode input[type=text] {
        display:block;
        }

        ul li.editMode label {
        display:none;
        }
    </style>
<body>

    <div class="container">
        <p>
          <label for="new-task">Add Task</label>
          <form action='create/todo' method="POST">
            {{ csrf_field() }}
            <input id="new-task" type="text" name='todo'>
            <button type="submit" >Add</button>
          </form>
        </p>
      
        <h3>Todo</h3>
        <ul id="incomplete-tasks">
            @foreach($data as $row)
            @if(!$row->completed)
            <li>
              <form action="state/todo/{{$row->id}}" method="post">
                  {{ csrf_field() }}
                  <input type="checkbox" onChange="this.form.submit()">
              </form>
                  <label>{{$row->todo}}</label>
                  <a href="delete/todo/{{$row->id}}" class="delete">Delete</a>
              </li>
            @endif
            @endforeach
        </ul>
        <h3>Completed</h3>
        <ul id="completed-tasks">
          <li>
              @foreach($data as $row)
              @if($row->completed)
              <li>
                <form action="state/todo/{{$row->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="checkbox" onChange="this.form.submit()" checked>
                </form>
                    <label>{{$row->todo}}</label>
                    <a href="delete/todo/{{$row->id}}" class="delete">Delete</a>
                </li>
              @endif
              @endforeach  
          </li>
        </ul>
      </div>
      

</body>
</html>
