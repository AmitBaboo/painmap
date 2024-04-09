<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCustomersViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW customers_vw AS
            select
                c.id AS id,
                c.full_name AS full_name,
                c.contact_number AS contact_number,
                c.email AS email,
                c.post_code AS post_code,
                c.status AS status,
                c.therapist_id AS therapist_id,
                c.created_at AS created_at,
                c.updated_at AS updated_at,
                case
                    when c.status = 1 then 'Contacted'
                    when c.status = 2 then 'Met Customer'
                    else 'Assigned'
                end AS status_name,
                u.first_name AS therapist
            from
                customers c
            join users u on
                c.therapist_id = u.id
            order by
                c.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers_view');
    }
}
