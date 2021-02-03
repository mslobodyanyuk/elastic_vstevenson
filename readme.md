What you need to work and how to use the ElasticSearch PHP client
=================================================================

* ***JAVA(11)***

Useful information:

<https://losst.ru/ustanovka-java-v-ubuntu-18-04>

_"1. INSTALLING OPENJDK 11_

_Java 11 is the latest version of Java(- as of August 23rd, 2019 ). This is a long-term support version, so it will be supported until 2026. The free version is in the official repositories, so you can install it from there without any problems:_

_Or, you can install the JRE edition just to run programs:..."_

<https://fornex.com/help/java-ubuntu-16-04/>


* ***One of the installation versions:***

<https://stackoverflow.com/questions/52504825/how-to-install-jdk-11-under-ubuntu>

"To install Openjdk 11 in Ubuntu, the following commands worked well..."

	sudo add-apt-repository ppa:openjdk-r/ppa
	sudo apt-get update
	sudo apt install openjdk-11-jdk
	
INSTALL JAVA(11)
================

<https://www.fosstechnix.com/install-elasticsearch-on-ubuntu/>

+ Update the system packages

	sudo apt update
	
+ Install the apt-transport-https package to access repository over HTTPS

	sudo apt install apt-transport-https
	
+ Install Java on Ubuntu

Lets install OpenJDK 11 on ubuntu  using below commands.

	sudo apt install openjdk-11-jdk

+ Lets verify java version

	java -version

	update-alternatives --config java

	//Copy
	/usr/lib/jvm/java-11-openjdk-amd64/bin/java
	sudo nano /etc/environment
	JAVA_HOME="/usr/lib/jvm/java-11-openjdk-amd64/bin/java"  

	source /etc/environment	
	echo $JAVA_HOME	
	
#### useful JAVA INSTALL links:

<https://losst.ru/ustanovka-java-v-ubuntu-18-04>

<https://fornex.com/help/java-ubuntu-16-04/>

<https://stackoverflow.com/questions/52504825/how-to-install-jdk-11-under-ubuntu>	

<https://www.fosstechnix.com/install-elasticsearch-on-ubuntu/>
	
INSTALL ElasticSearch
=====================

<https://www.fosstechnix.com/install-elasticsearch-on-ubuntu/>

	sudo wget -qO - https://artifacts.elastic.co/GPG-KEY-elasticsearch | sudo apt-key add -
	sudo echo "deb https://artifacts.elastic.co/packages/7.x/apt stable main" | sudo tee -a /etc/apt/sources.list.d/elastic-7.x.list

	sudo apt-get update

	sudo systemctl start elasticsearch
	
OR:	

	cd /opt/es
	./bin/elasticsearch
	
_- DOES NOT START !!! _
_- gave an ERROR - added `'bin/java'` again to the path in $HOME_JAVA( `sudo nano/etc/environment`). - REMOVED `'bin/java'` from the path to $HOME_JAVA and STARTED._	
				
	source /etc/environment
	echo $JAVA_HOME	

+ Check in the Browser:	
	
	http://localhost:9200

+ or in the Terminal:	

	curl -X GET "localhost:9200"	

* ***Actions on the deployment of the project:***

- Making a new project elastic_codecourse.loc:
																		
	sudo chmod -R 777 /var/www/Elasticsearch/elastic_vstevenson.loc

	//!!!! .conf
	sudo cp /etc/apache2/sites-available/test.loc.conf /etc/apache2/sites-available/elastic_vstevenson.loc.conf
			
	sudo nano /etc/apache2/sites-available/elastic_vstevenson.loc.conf

	sudo a2ensite elastic_vstevenson.loc.conf

	sudo systemctl restart apache2

	sudo nano /etc/hosts

	cd /var/www/Elasticsearch/elastic_vstevenson.loc
	
- Deploy project:

	`git clone << >>`
	
	_+ Сut the contents of the folder up one level and delete the empty one._

	`composer install`		
	
#### useful INSTALL ElasticSearch links:	

<https://www.fosstechnix.com/install-elasticsearch-on-ubuntu/>
											
- For install ElasticSearch PHP Client follow the tutorial:	

---

Vincent Stevenson

[ElasticSearch PHP Client (14:29)]( https://www.youtube.com/watch?v=Px6nRM_iyQw&ab_channel=VincentStevenson )
	
I walk through how to install and configure the ElasticSearch Low Level PHP client ( 
<https://github.com/elastic/elasticsearch-php> ) using MAMP to host the PHP on the local Windows 10 machine and Composer to install the ElasticSearch PHP client.
I also show how we can create a test document and query it through PHP.

[(1:30)]( https://youtu.be/Px6nRM_iyQw?t=90 )

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/1.png )

[(5:30)]( https://youtu.be/Px6nRM_iyQw?t=330 )

```
{
	"require": {
		"elasticsearch/elasticsearch": "^7.0"
	}
}
```

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/3.png )

	cd /var/www/Elasticsearch/elastic_vstevenson.loc

[(6:23)]( https://youtu.be/Px6nRM_iyQw?t=383 )
	
	composer install
	
![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/4.png )	

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/5.png )	

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/6.png )

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/7.png )

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/8.png )

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id',
    'body'  => ['testField' => 'abc']
];

$response = $client->index($params);
print_r($response);
```

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/9.png )

ElasticSearch Settings 
======================

<https://stackoverflow.com/questions/58656747/elasticsearch-job-for-elasticsearch-service-failed/58656748>

	sudo nano /etc/elasticsearch/elasticsearch.yml
	
_Your network settings should be:_

```
# Set the bind address to a specific IP (IPv4 or IPv6):
#
network.host: 127.0.0.1
#
# Set a custom port for HTTP:
#
http.port: 9200
```

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/2.png )

In one Terminal we should start ElasticSearch:

	sudo systemctl start elasticsearch.service

In another Terminal in project folder:

	php index.php

OR in the Browser:

	http://elastic_vstevenson.loc

[(12:25)]( https://youtu.be/Px6nRM_iyQw?t=745 )

ERROR: 

_"...No alive nodes found in your cluster in..."_

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/10.png )

Solved the problem by uncommenting and removing spaces( - writing from scratch ) near "`cluster.name`" and "`node.name:`" in `/etc/elasticsearch/elasticsearch.yaml`. 
 
<https://stackoverflow.com/questions/42549586/elastic-search-give-an-error-no-alive-nodes-found-in-your-cluster>

	sudo chmod -R 777 /etc/elasticsearch
						
`elasticsearch.yaml`:

```
cluster.name: my-application
...
node.name: node-1
```

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/11.png )

<https://www.elastic.co/guide/en/elasticsearch/reference/current/settings.html>

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/12.png )

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/13.png )

#### useful ElasticSearch Settings links:

<https://stackoverflow.com/questions/58656747/elasticsearch-job-for-elasticsearch-service-failed/58656748>

<https://stackoverflow.com/questions/42549586/elastic-search-give-an-error-no-alive-nodes-found-in-your-cluster>

[(13:15)]( https://youtu.be/Px6nRM_iyQw?t=795 )

```php		
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

$response = $client->get($params);
print_r($response);
```

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/14.png )

[(13:25)]( https://youtu.be/Px6nRM_iyQw?t=805 )

![screenshot of sample]( https://github.com/mslobodyanyuk/elastic_vstevenson/blob/master/public/images/15.png )

#### Useful links:

Vincent Stevenson

[ElasticSearch PHP Client]( https://www.youtube.com/watch?v=Px6nRM_iyQw&ab_channel=VincentStevenson )

ElasticSearch PHP Client

<https://github.com/elastic/elasticsearch-php>

JAVA INSTALL

<https://losst.ru/ustanovka-java-v-ubuntu-18-04>

<https://fornex.com/help/java-ubuntu-16-04/>

<https://stackoverflow.com/questions/52504825/how-to-install-jdk-11-under-ubuntu>	

<https://www.fosstechnix.com/install-elasticsearch-on-ubuntu/>

INSTALL ElasticSearch

<https://www.fosstechnix.com/install-elasticsearch-on-ubuntu/>
											
ElasticSearch Settings possible errors:

<https://stackoverflow.com/questions/58656747/elasticsearch-job-for-elasticsearch-service-failed/58656748>

<https://stackoverflow.com/questions/42549586/elastic-search-give-an-error-no-alive-nodes-found-in-your-cluster>