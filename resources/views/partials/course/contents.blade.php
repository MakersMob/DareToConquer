<section class="content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8">
        <h2>What Is Inside</h2>
        @if(count($modules) == 0)
          <p class="text-center">Nothing because this course hasn't launched yet.</p>
        @else
          <table class="table">
            <?php $c = 1; ?>
            @foreach($modules as $module)
              @if(count($module->less) > 0)
                <tr class="section">
                  <td colspan="2">Module {{$c}}: {{$module->name}}</td>
                </tr>
                <?php $c++;?>
                <?php $count = 1; ?>
                @foreach($module->less as $less)
                  <tr class="lessons">
                    <td>{{ $count }}</td>
                    <td>{{ $less->name }}</a></td>
                  </tr>
                  <?php $count++;?>
                @endforeach
              @endif
            @endforeach
          </table>
        @endif
      </div>
    </div>
  </div>
</section>