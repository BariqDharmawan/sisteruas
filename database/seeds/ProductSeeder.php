<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($product = 1; $product <= 12; $product++) {
        if($product % 2 == 0) {
          DB::table('product')->insert([
            'slug' => 'product-' . $product,
            'title' => 'Product ' . $product,
            'cover' => 'product2_content.webp',
            'subtitle' => Str::random(15),
            'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim vulputate in adipiscing mattis interdum tellus consequat tincidunt. Gravida mauris arcu eu pretium amet, aliquet.',
            'content' =>
              ' <h6>' . 'Product ' . $product . '</h6><p>' . 'Product ' . $product . ' portfolio offers a broad line of container desiccants that offer versatile protection against damaging humidity and moisture during intermodal transport. Available in bags, poles and strips, these industry-leading products absorb up to three times their weight in moisture and trap it as a thick gel that will not spill or drip.</p><p><br></p><h6>Preventing “Container Rain”</h6><p>A unique feature of Container Dri II desiccants also referred to as moisture absorbing bags, or dry bags is dew point control. Dew point is the temperature at which condensation starts to form on surfaces, such as container walls and roofs. By aggressively removing moisture from ambient air, Container Dri II products lower the dew point to prevent “container rain”, “container sweat”, or also known as “cargo sweat”, from damaging goods in transit.</p><p><span style="font-size: 0.88rem;"><br></span></p><h6>Food Shipments</h6><p>Container Dri II has already enjoyed success protecting cocoa bean shipments from moisture damage by providing the highest moisture absorption of any calcium chloride–based product, easily addressing the 65 percent or higher loading of calcium chloride recommended in the Federation of Cocoa Commerce Ltd. (FCC) guidelines for shipment of cocoa beans in containers.</p><p><span style="font-size: 0.88rem;"><br></span></p><h6>Usage Scenarios</h6><ul><li>there is a large volume of air requiring moisture removal</li><li>high levels of humidity are present due to climate, cargo or storage conditions</li><li>the container admits exterior air and humidity</li></ul><h6>Benefit</h6><ul><li>Safe for direct use with food products</li><li>Safe &amp; easy to handle</li><li>Dispose with normal industrial waste</li></ul>',
            'video' => '2second.mp4'
          ]);
        }
        elseif($product % 3 == 0) {
          DB::table('product')->insert([
            'slug' => 'product-' . $product,
            'title' => 'Product ' . $product,
            'cover' => 'product3_content.webp',
            'subtitle' => Str::random(15),
            'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim vulputate in adipiscing mattis interdum tellus consequat tincidunt. Gravida mauris arcu eu pretium amet, aliquet.',
            'content' =>
              ' <h6>' . 'Product ' . $product . '</h6><p>' . 'Product ' . $product . ' portfolio offers a broad line of container desiccants that offer versatile protection against damaging humidity and moisture during intermodal transport. Available in bags, poles and strips, these industry-leading products absorb up to three times their weight in moisture and trap it as a thick gel that will not spill or drip.</p><p><br></p><h6>Preventing “Container Rain”</h6><p>A unique feature of Container Dri II desiccants also referred to as moisture absorbing bags, or dry bags is dew point control. Dew point is the temperature at which condensation starts to form on surfaces, such as container walls and roofs. By aggressively removing moisture from ambient air, Container Dri II products lower the dew point to prevent “container rain”, “container sweat”, or also known as “cargo sweat”, from damaging goods in transit.</p><p><span style="font-size: 0.88rem;"><br></span></p><h6>Food Shipments</h6><p>Container Dri II has already enjoyed success protecting cocoa bean shipments from moisture damage by providing the highest moisture absorption of any calcium chloride–based product, easily addressing the 65 percent or higher loading of calcium chloride recommended in the Federation of Cocoa Commerce Ltd. (FCC) guidelines for shipment of cocoa beans in containers.</p><p><span style="font-size: 0.88rem;"><br></span></p><h6>Usage Scenarios</h6><ul><li>there is a large volume of air requiring moisture removal</li><li>high levels of humidity are present due to climate, cargo or storage conditions</li><li>the container admits exterior air and humidity</li></ul><h6>Benefit</h6><ul><li>Safe for direct use with food products</li><li>Safe &amp; easy to handle</li><li>Dispose with normal industrial waste</li></ul>',
            'video' => '2second.mp4'
          ]);
        }
        else {
          DB::table('product')->insert([
            'slug' => 'product-' . $product,
            'title' => 'Product ' . $product,
            'cover' => 'product1_content.webp',
            'subtitle' => Str::random(15),
            'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim vulputate in adipiscing mattis interdum tellus consequat tincidunt. Gravida mauris arcu eu pretium amet, aliquet.',
            'content' =>
              ' <h6>' . 'Product ' . $product . '</h6><p>' . 'Product ' . $product . ' portfolio offers a broad line of container desiccants that offer versatile protection against damaging humidity and moisture during intermodal transport. Available in bags, poles and strips, these industry-leading products absorb up to three times their weight in moisture and trap it as a thick gel that will not spill or drip.</p><p><br></p><h6>Preventing “Container Rain”</h6><p>A unique feature of Container Dri II desiccants also referred to as moisture absorbing bags, or dry bags is dew point control. Dew point is the temperature at which condensation starts to form on surfaces, such as container walls and roofs. By aggressively removing moisture from ambient air, Container Dri II products lower the dew point to prevent “container rain”, “container sweat”, or also known as “cargo sweat”, from damaging goods in transit.</p><p><span style="font-size: 0.88rem;"><br></span></p><h6>Food Shipments</h6><p>Container Dri II has already enjoyed success protecting cocoa bean shipments from moisture damage by providing the highest moisture absorption of any calcium chloride–based product, easily addressing the 65 percent or higher loading of calcium chloride recommended in the Federation of Cocoa Commerce Ltd. (FCC) guidelines for shipment of cocoa beans in containers.</p><p><span style="font-size: 0.88rem;"><br></span></p><h6>Usage Scenarios</h6><ul><li>there is a large volume of air requiring moisture removal</li><li>high levels of humidity are present due to climate, cargo or storage conditions</li><li>the container admits exterior air and humidity</li></ul><h6>Benefit</h6><ul><li>Safe for direct use with food products</li><li>Safe &amp; easy to handle</li><li>Dispose with normal industrial waste</li></ul>',
            'video' => '2second.mp4'
          ]);
        }
      }
    }
}
