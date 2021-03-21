@extends('front.master.master')

  @section('title')
description | Codetree
  @endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}public/front/css/style.css" />
 <link rel="stylesheet" href="{{ asset('/') }}public/front/css/hosting.css" />
    
 <link
      rel="stylesheet"
      media="screen and (max-width: 768px)"
      href="{{asset('/')}}public/front/css/mobile.css"
    />
@endsection
  @section('body')
    <section id="hosting-pricing" class="py-3">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="hosting-pricing-container">
          <div class="hosting-pricing-header">
            <h1>IBM Cloud (Shared) Hosting Price</h1>
            <p>
              We make sure your website is fast, secure & always up - so your
              visitors & search engines trust you. Guaranteed.
            </p>
            
            <a type="button" href="{{route('hosting')}}" class="btn btn-transparent">Pricing</a>
            &nbsp
            <a type="button" href="{{route('cloud_description')}}" class="btn btn-transparent">Description</a>

          </div>
         
        </div>
      </div>
    </section>

    <section id="hosting-features" class="py-3" >
      <div class="container">
        <div class="hosting-features-header">
          <h1>Features</h1>
        </div>
      </div>
      <div class="features">
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Private Cloud</h1>
              <p>The power of cloud, the control and security of dedicated</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Private clouds offer the power, efficiency, and features of a
                public cloud, with the security, control, and performance of a
                dedicated environment. But private clouds are complex to
                operate. They require experts who understand cloud architecture
                and know how to upgrade, patch, secure, monitor, and scale a
                cloud environment. With a managed private cloud by Quantic
                Dynamics, we take care of the infrastructure and management,
                giving you the cloud expertise you need so you can focus on your
                core business.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  <h1>Security</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Get the enhanced security of dedicated, physically isolated
                    network, compute and storage layers.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                  <h1>Customizable</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Customize the dedicated compute, storage and networking
                    components to best suit your needs.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-bolt" aria-hidden="true"></i>
                  <h1>Performance</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Gain performance advantages like Bare Metal Server,
                    dedicated resources for your business.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Public Cloud</h1>
              <p>
                Competitive price with the scalability and flexibility of
                private cloud
              </p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                In the public cloud, you get quick access to compute, storage,
                app hosting and more — as much as you need when you need it. You
                have guaranteed access to compute and storage resources. In a
                public cloud environment, you get the scalability and
                flexibility of private cloud, but the price is very competitive.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-sliders" aria-hidden="true"></i>
                  <h1>Scalable</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Scale on-demand to meet site load requirements during
                    traffic spikes.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                  <h1>Cost Efficient</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Pay only for the server resources that you require,
                    processor, memory, storage & networking.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                  <h1>Flexible</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Public clouds allow you to add networking, storage,
                    databases and more, including all the features of a private
                    cloud.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Managed Bare Metal Cloud</h1>
              <p>Raw performance at your fingertips</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Quantic Dynamics managed bare metal cloud provide the raw
                horsepower you demand for your processor-intensive and disk
                I/O-intensive workloads. These servers come with the most
                complete package of standard features and services. You can
                customize the hardware resources in your bare metal cloud and
                hardware can be modified anytime you want.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-bolt" aria-hidden="true"></i>

                  <h1>Powerful</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Choose from entry-level single proc servers to quad proc,
                    hex-core, and even GPU-powered workhorses.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                  <h1>Customizable</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Fully customize your dedicated server with RAM, SSD hard
                    drives, network uplinks, and much more.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>

                  <h1>Managed</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Integrated on a single platform to optimize performance
                    including 24x7x365 managed support.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Big Data Cloud</h1>
              <p>A big data cloud environment, built from scratch</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Some customers prefer to configure their big data cloud from the
                ground up. If that’s you, you’re in the right place. Quantic
                Dynamics has the servers and services you need to do just that.
                Create a custom big data cloud solution at Quantic Dynamics, and
                your application can leverage the exact amount of performance
                and scalability you want from our servers and advanced network.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-bolt" aria-hidden="true"></i>
                  <h1>Bare Metal Power</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Avoid the performance costs of shared hardware in virtual
                    systems.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-line-chart" aria-hidden="true"></i>
                  <h1>Predictability</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    The predictable performance of bare metal lets you plan
                    ahead to scale as your operations grow.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                  <h1>Higher Scalability</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Scale up, out, in, or down on demand, with two to four hours
                    deployment and monthly or yearly pricing.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Block Storage</h1>
              <p>Local disk performance with SAN persistence and durability</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Deploy flash-backed Block Storage with customizable performance
                and sizes up to 12TB. Increase storage capacity available to
                your Quantic Dynamics Virtual and Bare Metal Servers with a
                maximum of 48,000 IOPs. Take advantage of snapshots and
                replication when provisioning with Endurance tiers—featuring
                simple, predefined, performance levels ideal for most general
                purpose workloads. Or, build a fine-tuned environment with
                allocated IOPS from Performance options—ideal for businesses
                with well understood performance requirements. Protect your data
                with provider managed, encryption for data at rest.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-bolt" aria-hidden="true"></i>
                  <h1>Reliable</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Use for archiving, backup and content repositories. Or,
                    store content for analytics, social, and mobile workloads.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                  <h1>When and Where You Need It</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Choose your level of resiliency for data availability in
                    single or multiple regions.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                  <h1>Access</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Access your data from anywhere in the world using built-in
                    SFTP.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>File Storage</h1>
              <p>Fast and flexible NFS-based file storage</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Get total control over your file shares function and performance
                with flash-backed File Storage. Create file shares with your
                desired capacity—from 20GB to 12TB—and provision those file
                shares with a variety of flexible and power-based options while
                minimizing costs. Take advantage of snapshots and replication
                when provisioning with Endurance tiers— featuring simple,
                predefined, performance levels with simple per GB pricing ideal
                for most general purpose workloads. Or, build a fine-tuned
                environment with allocated IOPS from Performance options—ideal
                for businesses with well understood performance requirements.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                  <h1>Customization</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Choose easy to edit scaling options based on your particular
                    size and performance needs.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-bolt" aria-hidden="true"></i>
                  <h1>Reliable</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Stay confident with storage designed to protect from data
                    loss during maintenance or failures.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                  <h1>Global</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Add file storage to your cloud environment in any of our 7
                    global data centers.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Object Storage</h1>
              <p>Flexible object storage for your unstructured data.</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Experience superior flexibility for your evolving business
                needs. Deploy stand-alone services, or integrate seamlessly with
                other Quantic Dynamics services. Access your data from anywhere
                in the world. Enterprise availability and security.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-random" aria-hidden="true"></i>
                  <h1>Flexible</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Use for archiving, backup and content repositories. Or,
                    store content for analytics, social, and mobile workloads.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-check" aria-hidden="true"></i>
                  <h1>Always On Availability</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Choose your level of resiliency for data availability in
                    single or multiple regions.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                  <h1>Access</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Access your data from anywhere in the world using built-in
                    SFTP.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="feature-header">
            <div
              class="container"
              data-aos="fade-left"
              data-aos-duration="1200"
            >
              <h1>Cloud Backup</h1>
              <p>Expect the best, prepare for the worst</p>
            </div>
          </div>
          <div class="container">
            <div class="feature-details py-2">
              <p>
                Keep identical copies of your most valuable asset—your data. No
                one expects data corruption or loss, but it is far less
                expensive to maintain a backup than to have to recreate it from
                scratch. Quantic Dynamics provides turnkey EVault, R1Soft and
                VeeAM automatic Backup and DR solutions, as well as the ability
                to create your own using our virtual or bare metal server
                running your own backup application.
              </p>
            </div>
            <div class="feature-benefits">
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-tachometer" aria-hidden="true"></i>
                  <h1>Fast</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Speed up backups from hours to minutes with faster
                    read/write speeds and data transfer.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-arrows-h" aria-hidden="true"></i>
                  <h1>Flexible</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    Supports bare metal as well as virtual server restore and
                    recovery functionality.
                  </p>
                </div>
              </div>
              <div class="feature-benefit">
                <div class="feature-benefit-header">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                  <h1>Managed</h1>
                </div>
                <div class="feature-benefit-details">
                  <p>
                    We will manage the backup for you, as well as restore when
                    you need.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="hosting-partner">
      <div class="container" data-aos="fade-up" data-aos-duration="1200">
        <div class="hosting-partner-header">
          <h2>START BUILDING YOUR IDEAL SOLUTION RIGHT NOW</h2>
          
        </div>
        <div class="hosting-partner-logos">
          <img src="{{asset('/')}}public/front/img/IBM.png" alt="" />
          <img src="{{asset('/')}}public/front/img/IBM-Cloud.png" alt="" />
          <img src="{{asset('/')}}public/front/img/Red-Hat.png" alt="" />
          <img src="{{asset('/')}}public/front/img/barracuda.png" alt="" />
          <img src="{{asset('/')}}public/front/img/Microsoft.png" alt="" />
          <img src="{{asset('/')}}public/front/img/DigiCert.png" alt="" />
        </div>
        
        <a href="#" class="btn btn-transparent">Contact Now</a>
      </div>
    </section>
 @endsection