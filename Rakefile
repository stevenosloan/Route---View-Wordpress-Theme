require 'rake'
require 'colorize'
require 'sass'
require 'juicer'


desc "compile sass files"
task :sass do

  if system "sass --update --stop-on-error ./assets/css/scss:./assets/css --style expanded"
    puts "sass build complete".colorize( :green )
  else
    puts "sass error".colorize( :red )
  end
  
end


desc "process javascript files"
task :scripts do

  # config
  scripts = [ "tests.js", "site.js" ]

  puts "start merging scripts"

  # iterate through each script and merge those files
  scripts.each do |script|

    if system "juicer merge -s --force ./assets/scripts/#{script} -m none"
      puts "#{script} succesfully merged".colorize( :green )
    else
      puts "juicer encountered an error with #{script}".colorize( :red )
    end

  end

end