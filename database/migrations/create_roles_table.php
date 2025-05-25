Schema::create('roles', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->string('label')->nullable();
    $table->timestamps();
});



Schema::create('role_inheritance', function (Blueprint $table) {
    $table->foreignId('role_id');
    $table->foreignId('inherits_from_role_id');
    $table->primary(['role_id', 'inherits_from_role_id']);
});


Schema::create('permission_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id');
    $table->string('permission');
    $table->boolean('granted');
    $table->timestamp('checked_at');
});
