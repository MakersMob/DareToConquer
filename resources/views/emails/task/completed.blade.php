<p>Hello {{ $user->first_name }},</p>

<p>The most awesome DTC Member, {{ $tasker->first_name }} {{ $tasker->last_name }}, has completed your task. To view their work go to <a href="https://daretoconquer.com/task/{{ $task->id }}">the Task page</a>.</p>

<p>Nice job!</p>

<p>- Scrivs</p>