<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">To-Do List</h2>
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
    
    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Person</th>
                    <th>Task</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Last Update</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tasks as $task): ?>
                <tr>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['date']) ?></td>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['location']) ?></td>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['person']) ?></td>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['task']) ?></td>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['details']) ?></td>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['status']) ?></td>
                    <td class="d-block d-sm-table-cell"><?= html_escape($task['last_update']) ?></td>
                    <td class="d-block d-sm-table-cell">
                        <?php if ($task['status'] !== 'Completed'): ?>
                            <a href="<?= site_url('task/change_status/' . html_escape($task['id']) . '/Completed') ?>" class="btn btn-success btn-sm mb-1">Complete</a>
                        <?php endif; ?>
                        <?php if ($task['status'] !== 'Ditunda'): ?>
                            <a href="<?= site_url('task/change_status/' . html_escape($task['id']) . '/Ditunda') ?>" class="btn btn-warning btn-sm mb-1">Ditunda</a>
                        <?php endif; ?>
                        <?php if ($task['status'] !== 'Gagal'): ?>
                            <a href="<?= site_url('task/change_status/' . html_escape($task['id']) . '/Gagal') ?>" class="btn btn-danger btn-sm mb-1">Gagal</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding Task -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <?= form_open('task/add_task') ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="person">Person</label>
                        <input type="text" name="person" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="task">Task</label>
                        <input type="text" name="task" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
