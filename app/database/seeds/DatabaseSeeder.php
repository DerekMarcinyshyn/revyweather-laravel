<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('RevyweatherCurrentTableSeeder');
	}

}

class RevyweatherCurrentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('revyweather_current')->truncate();

        $dataFileHandler = fopen(app_path('assets/data/Weather.csv'), "r");

        while ($data = fgetcsv($dataFileHandler))
        {
            Current::create([
                'id'                => trim($data[0], '"'),
                'temp'              => trim($data[1], '"'),
                'humidity'          => trim($data[2], '"'),
                'relative_humidity' => trim($data[3], '"'),
                'bmp_temperature'   => trim($data[4], '"'),
                'barometer'         => trim($data[5], '"'),
                'direction'         => trim($data[6], '"'),
                'speed'             => trim($data[7], '"'),
                'created_at'        => trim($data[8], '"'),
                'updated_at'        => trim($data[8], '"')
            ]);
        }
        fclose($dataFileHandler);
    }
}
