<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student-name')->nullable();
            $table->string('father-name')->nullable();
            $table->string('mother-name')->nullable();
            $table->string('guardian-name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('cast')->nullable();
            $table->string('mobile-number')->nullable();
            $table->string('category1')->nullable();
            $table->string('category2')->nullable();
            $table->string('sex')->nullable();
            $table->string('permanent-address')->nullable();
            $table->string('your-email')->unique()->nullable();
            $table->string('phone-number')->nullable();
            $table->string('datebirth')->nullable();
            $table->string('adhar-no')->nullable();
            $table->string('last-school')->nullable();
            $table->string('roll-no')->nullable();
            $table->string('baSubject-1')->nullable();
            $table->string('baSubject-2')->nullable();
            $table->string('baSubject-3')->nullable();
            $table->string('baminorSubject')->nullable();
            $table->string('bacurricular-course')->nullable();
            $table->string('bavocational-courses')->nullable();
            $table->string('bscsubject-1')->nullable();
            $table->string('bscsubject-2')->nullable();
            $table->string('bscsubject-3')->nullable();
            $table->string('bscminorsubject')->nullable();
            $table->string('bsccurricular-course')->nullable();
            $table->string('bscvocational-courses')->nullable();
            $table->string('bed-subject')->nullable();
            $table->string('bed-subject2')->nullable();
            $table->string('bed_graduation-name-institution')->nullable();

            $table->string('bed_graduation-name-board')->nullable();
            $table->string('bed_graduation-passing-year')->nullable();
            $table->string('bed_graduation-max-marks')->nullable();
            $table->string('bed_graduation-marks-scored')->nullable();
            $table->string('bed_graduation-percent')->nullable();
            $table->string('bed_graduation-subject')->nullable();
            $table->string('deied-semster')->nullable();
            $table->string('graduation-name-institution')->nullable();
            $table->string('graduation-name-board')->nullable();
            $table->string('graduation-passing-year')->nullable();
            $table->string('graduation-max-marks')->nullable();
            $table->string('graduation-marks-scored')->nullable();
            $table->string('graduation-percent')->nullable();
            $table->string('graduation-subject')->nullable();
            $table->string('name-institution')->nullable();

            $table->string('high-name-board')->nullable();
            $table->string('high-passing-year')->nullable();
            $table->string('high-max-marks')->nullable();
            $table->string('marks-scored')->nullable();
            $table->string('high-percent')->nullable();
            $table->string('high-subject')->nullable();
            $table->string('inter-name-institution')->nullable();
            $table->string('inter-name-board')->nullable();
            $table->string('inter-passing-year')->nullable();
            $table->string('inter-max-marks')->nullable();
            $table->string('inter-marks-scored')->nullable();
            $table->string('inter-percent')->nullable();
            $table->string('inter-subject')->nullable();
            $table->string('signature')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
