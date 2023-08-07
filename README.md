### Wink Dashboard 

## Sail setup 
1. setup .env. retrieve all the need api keys.  
2. `sail up`. (you will need to get sail somehow for this)
3. `sail composer install `
4. `sail artisan key generate`
5. `sail artisan migrate`
5. `npm install `

## ngrok setup
1. install ngrok 
2. get your auth token 
3. set your config to the following. use `ngrok config check` to find the path create if it doesn't exist 
```yml
version: "2"
authtoken: {your auth token}
tunnels:
  site:
    addr: 80
    proto: http
    hostname: wink-dashboard.au.ngrok.io
  vite:
    addr: 4040
    proto: http
    hostname: wink-dashboard.au.ngrok.io
```
4. `ngrok start --all` open ngrok

## switching environments
1. rename the APP_ENV to match the environment 
2. restart sail 
3. if using ngrok `sail npm run build`
4. or local env `sail npm run dev`

## deploy
https://forge.laravel.com/servers/681043/sites/2002291/deploy/http?token=fKmYbg7CpAQkVSwlJRc4mKJt0eD39RofmkLw0v7p
https://wink-dashboard.tw-dev.com/dashboard

## Partner APIs References: 
we pull from the following apis: 
1. https://dev.commissionfactory.com/V1/Affiliate/Functions/GetMerchants/
2. https://integrations.impact.com/impact-publisher/reference/list-stores
3. https://api-docs.partnerize.com/partner/
4. https://developers.rakutenadvertising.com/documentation/en-US/affiliate_apis 
