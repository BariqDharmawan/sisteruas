<?php

use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('career')->insert([
          [
            'slug' => 'graphic-designer',
            'title' => 'Graphic Designer',
            'location' => 'HQ Office, South Jakarta',
            'job_desc' =>
              '<p style="margin-bottom:15px;font-weight:bold;">Graphic Designer</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu sollicitudin habitasse elit nunc.
                Aliquet sed proin fermentum urna sit mauris. Non ac aliquet lectus etiam dis pretium risus, cum. Proin elementum ut fermentum,
                nisl pellentesque quis sed nibh amet.</p>',
            'job_detail' =>
              "<p style='margin-bottom:15px;font-weight:bold;'>What You'll Do</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultricies augue vestibulum non nullam vitae aenean ut et mauris. Arcu urna, ligula elit
                sit pellentesque cursus tincidunt sed sit. Vulputate elit, imperdiet diam ullamcorper interdum purus. Rhoncus enim, ac est sagittis.
                Consequat quis ut tristique vitae. Diam felis urna sed turpis nisl dolor eu nulla vel.
                Risus consectetur nec, molestie consequat convallis ut praesent. Neque, consectetur et sem maecenas erat at vivamus venenatis.
                Condimentum tempus enim egestas varius convallis.</p>
                <ul>
                <li>there is a large volume of air requiring moisture removal</li>
                <li>high levels of humidity are present due to climate, cargo or storage conditions </li>
                <li>the container admits exterior air and humidity</li>
                </ul>"
          ],
          [
            'slug' => 'marketing-manager',
            'title' => 'Marketing Manager',
            'location' => 'HQ Office, South Jakarta',
            'job_desc' =>
              '<p style="margin-bottom:15px;font-weight:bold;">Marketing Manager</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu sollicitudin habitasse elit nunc.
                Aliquet sed proin fermentum urna sit mauris. Non ac aliquet lectus etiam dis pretium risus, cum. Proin elementum ut fermentum,
                nisl pellentesque quis sed nibh amet.</p>',
            'job_detail' =>
              "<p style='margin-bottom:15px;font-weight:bold;'>What You'll Do</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultricies augue vestibulum non nullam vitae aenean ut et mauris. Arcu urna, ligula elit
                sit pellentesque cursus tincidunt sed sit. Vulputate elit, imperdiet diam ullamcorper interdum purus. Rhoncus enim, ac est sagittis.
                Consequat quis ut tristique vitae. Diam felis urna sed turpis nisl dolor eu nulla vel.
                Risus consectetur nec, molestie consequat convallis ut praesent. Neque, consectetur et sem maecenas erat at vivamus venenatis.
                Condimentum tempus enim egestas varius convallis.</p>
                <ul>
                <li>there is a large volume of air requiring moisture removal</li>
                <li>high levels of humidity are present due to climate, cargo or storage conditions </li>
                <li>the container admits exterior air and humidity</li>
                </ul>"
          ],
          [
            'slug' => 'hrd-manager',
            'title' => 'HRD Manager',
            'location' => 'HQ Office, South Jakarta',
            'job_desc' =>
              '<p style="margin-bottom:15px;font-weight:bold;">HRD Manager</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu sollicitudin habitasse elit nunc.
                Aliquet sed proin fermentum urna sit mauris. Non ac aliquet lectus etiam dis pretium risus, cum. Proin elementum ut fermentum,
                nisl pellentesque quis sed nibh amet.</p>',
            'job_detail' =>
              "<p style='margin-bottom:15px;font-weight:bold;'>What You'll Do</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultricies augue vestibulum non nullam vitae aenean ut et mauris. Arcu urna, ligula elit
                sit pellentesque cursus tincidunt sed sit. Vulputate elit, imperdiet diam ullamcorper interdum purus. Rhoncus enim, ac est sagittis.
                Consequat quis ut tristique vitae. Diam felis urna sed turpis nisl dolor eu nulla vel.
                Risus consectetur nec, molestie consequat convallis ut praesent. Neque, consectetur et sem maecenas erat at vivamus venenatis.
                Condimentum tempus enim egestas varius convallis.</p>
                <ul>
                <li>there is a large volume of air requiring moisture removal</li>
                <li>high levels of humidity are present due to climate, cargo or storage conditions </li>
                <li>the container admits exterior air and humidity</li>
                </ul>"
          ]
        ]);
    }
}
