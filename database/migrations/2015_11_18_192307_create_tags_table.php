public function up()
{
    Schema::create('tags', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->string('name');
    });
}

public function down()
{
    Schema::drop('tags');
}
