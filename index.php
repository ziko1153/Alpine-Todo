<?php
// var_dump($_POST);

$lists = [
    [
        'house_select' => 1,
        'score' => 20,
        'quantity' => 5,
        'id' => 23
    ],

    [
        'house_select' => 3,
        'score' => 20,
        'quantity' => 5,
        'id' => 25
    ],
    [
        'house_select' => 3,
        'score' => 20,
        'quantity' => 5,
        'id' => 'task_a3fsdf'
    ],
    [
        'house_select' => 3,
        'score' => 20,
        'quantity' => 5,
        'id' => 24
    ],
];

$lists2 = [
    25, 12, 23, 24
];

$finalID = array_map(function ($a) {

    return $a['id'];
}, $lists);

var_dump(array_diff($lists2, $finalID));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpine Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

    <div class="container" x-data="taskList">
        <form method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Select House Structure</th>
                        <th scope="col">Score</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>

                    <template x-for="(task, index) in tasks" :key="index">


                        <tr>
                            <td>
                                <select class="form-select" x-model="task.house_select" x-bind:name="`house_select[${task.id}]`">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </td>
                            <td><input x-model="task.score" class="form-control" type="number" min="1" x-bind:name="`score[${task.id}]`" placeholder="Score" required /></td>
                            <td><input x-model="task.quantity" class="form-control" type="number" min="1" x-bind:name="`quantity[${task.id}]`" placeholder="Quantity" required></td>
                            <td><button class="btn btn-default" @click.prevent="removeTask(index)">X</button></td>
                        </tr>


                    </template>


                </tbody>


            </table>
            <button @click.prevent="addNewTask()">Add +</button>
            <button type="submit">Submit</button>
        </form>
    </div>



</body>

</html>

<script>
    let taskList = {

        tasks: <?php echo isset($lists) ? json_encode($lists) : [] ?>,
        addNewTask() {
            this.tasks.push({
                house_select: 1,
                score: '',
                quantity: '',
                id: 'todo_' + (Math.random() + 1).toString(36).substring(7)
            });
        },
        removeTask(index) {
            console.log(index);
            this.tasks.splice(index, 1);
        },

    }
</script>