<div align="center">

# Monitoring

A simple monitoring API written in PHP called using Axios JS

![monitoring](https://user-images.githubusercontent.com/125673909/219788855-58c4539c-287a-401d-bdf6-d97f203e257f.png)


</div>

# Features 

Cards   
- Display OS Name and Kernel version
- Display RAM usage 
- Display disk usage and total disk space
- Display the current uptime

Graph    
- Display a graph of the CPU usage 
- Display a Circular diagram of the RAM usage on the total RAM

# API

Api is callable on /api/api.php and accept only GET parameters.

| Argument       | Description                          | 
|---             |:--                                   | 
| ?ramusage      | Get Ram usage                        |
| ?ramtotal      | Get total Ram size                   |
| ?diskusage     | Get DIsk usage                       |
| ?disktotal     | Get total Disk size                  |           
| ?osname        | Get OS name                          | 
| ?kernel        | Get Kernel version                   | 
| ?uptime        | Get the uptime of the machine        |    


# Installation

Install apache/nginx and PHP on your machine, then depending on your OS, go to /srv/http OR /var/www/html

```bash
git clone https://github.com/Anasi10/Monitoring
cd Monitoring
mv * ..
cd .. && rm -r Monitoring
chmod 777 assets/scripts/cpu.txt assets/scripts/cpuusage.sh
```

Start the HTTP and the PHP service, and go to 127.0.0.1 
