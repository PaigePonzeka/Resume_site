require 'fileutils'


def read_directory(pathname)
  FileUtils.cp_r( "#{pathname}/.", './')

end

read_directory("public")
