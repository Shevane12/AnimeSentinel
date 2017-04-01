import sys
import os
from selenium import webdriver

if __name__ == "__main__":
  os.environ["DISPLAY"] = ":99"

  profile = webdriver.FirefoxProfile()
  profile.add_extension(sys.argv[2] + '/addon-1865-latest.xpi')
  if len(sys.argv) > 4 and len(sys.argv[4]) > 0:
    profile.set_preference("general.useragent.override", sys.argv[4])
  driver = webdriver.Firefox(profile)
  # driver.set_window_size(1920, 1080)

  driver.get(sys.argv[1])
  if len(sys.argv) > 3 and len(sys.argv[3]) > 0:
    for cookie in sys.argv[3].split(';'):
        cookie = cookie.strip().split('=')
        driver.add_cookie({'name': cookie[0], 'value': cookie[1]})
    driver.get(sys.argv[1])

  print(driver.execute_script("return document.documentElement.outerHTML"))
  driver.quit()
