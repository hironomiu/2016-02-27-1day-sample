# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "puppetlabs/centos-7.0-64-puppet"
  config.vm.hostname = "1day.local"
  config.vm.network :private_network, ip: "192.168.56.8"
  config.vm.provider :virtualbox do |vb|
    vb.name = "1day"
    vb.customize ["modifyvm", :id, "--memory", "768"]
  end
  config.vm.provision :shell, :path => "bootstrap.sh"
end

